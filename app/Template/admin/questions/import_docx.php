<?php
// File: admin/questions/import-docx.php

// اطمینان از وجود فایل آپلود شده
if (isset($_FILES['doc_file']) && $_FILES['doc_file']['error'] === UPLOAD_ERR_OK) {
    $filePath = $_FILES['doc_file']['tmp_name'];
    $quiz_id = isset($_GET['quiz_id']) ? (int)$_GET['quiz_id'] : 0;

    $questions = [];
    $errors = [];

    try {
        // بارگذاری فایل Word با استفاده از کتابخانه PhpWord
        $phpWord = \PhpOffice\PhpWord\IOFactory::load($filePath);

        $current_question = null;

        // پیمایش تمام پاراگراف‌های فایل Word
        foreach ($phpWord->getSections() as $section) {
            foreach ($section->getElements() as $element) {
                // ما فقط با پاراگراف‌ها (TextRun) کار می‌کنیم
                if ($element instanceof \PhpOffice\PhpWord\Element\TextRun) {
                    $line_text = '';
                    foreach ($element->getElements() as $textElement) {
                        if ($textElement instanceof \PhpOffice\PhpWord\Element\Text) {
                            $line_text .= $textElement->getText();
                        }
                    }

                    $line_text = trim($line_text);

                    if (empty($line_text)) continue; // نادیده گرفتن خطوط خالی

                    // الگو برای پیدا کردن سوال: شروع با عدد و نقطه (e.g., "1.")
                    if (preg_match('/^(\d+)\.\s*(.+)/', $line_text, $matches)) {
                        // اگر سوال قبلی تمام شده، آن را در آرایه ذخیره کن
                        if ($current_question) {
                            $questions[] = $current_question;
                        }
                        // شروع سوال جدید
                        $current_question = [
                            'question_text' => $matches[2],
                            'options' => [],
                            'correct_answer' => null
                        ];
                    }
                    // الگو برای پیدا کردن گزینه‌ها: شروع با "پاسخ" و عدد (e.g., "پاسخ1:")
                    elseif (preg_match('/^پاسخ(\d+):\s*(.+)/', $line_text, $matches) && $current_question) {
                        $option_number = (int)$matches[1];
                        $option_text = $matches[2];
                        $current_question['options'][$option_number] = $option_text;
                    }
                    // الگو برای پیدا کردن پاسخ صحیح: شروع با "پاسخ صحیح:"
                    elseif (preg_match('/^پاسخ صحیح:\s*(\d+)/', $line_text, $matches) && $current_question) {
                        $current_question['correct_answer'] = (int)$matches[1];
                    }
                }
            }
        }

        // اضافه کردن آخرین سوال به لیست
        if ($current_question) {
            $questions[] = $current_question;
        }
    } catch (Exception $e) {
        // اگر در خواندن فایل خطایی رخ داد
        $errors[] = "خطا در پردازش فایل Word: " . $e->getMessage();
    }

    // حالا متغیر $questions شامل تمام سوالات استخراج شده است.
    // می‌توانید آن را نمایش دهید یا در پایگاه داده ذخیره کنید.

    // ... بقیه کد شما برای نمایش پیش‌نمایش ...
    // در اینجا ما فقط برای نمونه، محتوای استخراج شده را چاپ می‌کنیم تا ببینید کار می‌کند یا نه.

    if (empty($questions) && empty($errors)) {
        $errors[] = "هیچ سوالی با فرمت مورد انتظار (شروع سوال با '1.'، گزینه‌ها با 'پاسخ1:') پیدا نشد. لطفاً فایل نمونه را بررسی کنید.";
    }
} else {
    $errors[] = "خطا در آپلود فایل. لطفاً دوباره تلاش کنید.";
}

// نمایش خطاها و نتایج (این بخش را باید در قالب HTML خود ادغام کنید)
if (!empty($errors)) {
    echo "<h3>خطاها:</h3>";
    echo "<ul style='color: red;'>";
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>";
}

if (!empty($questions)) {
    echo "<h3>سوالات استخراج شده:</h3>";
    echo "<pre>";
    print_r($questions);
    echo "</pre>";
}
