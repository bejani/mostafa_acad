<script>
    function parseQuestion() {
        let raw = document.getElementById("rawInput").value.trim();

        if (!raw) {
            alert("متن را وارد کنید");
            return;
        }

        // تبدیل گزینه‌های فارسی به A B C D
        raw = raw
            .replace(/الف\)/g, "A)")
            .replace(/ب\)/g, "B)")
            .replace(/ج\)/g, "C)")
            .replace(/د\)/g, "D)");

        let lines = raw.split("\n").map(l => l.trim()).filter(l => l !== "");

        // پیدا کردن اولین گزینه
        let firstOptIndex = lines.findIndex(l => /^[A-D]\)/.test(l));

        if (firstOptIndex === -1) {
            alert("گزینه‌ها شناسایی نشدند. ساختار باید A) یا الف) باشد.");
            return;
        }

        // سوال = تمام خطوط قبل از A)
        let question = lines.slice(0, firstOptIndex).join(" ");

        // استخراج گزینه‌ها
        let A = extractOpt(lines, "A)");
        let B = extractOpt(lines, "B)");
        let C = extractOpt(lines, "C)");
        let D = extractOpt(lines, "D)");

        // پاسخ صحیح
        let correct = "";
        let match = raw.match(/پاسخ\s*[:：]?\s*([A-D])/i);
        if (match) {
            correct = match[1].toUpperCase();
        }

        document.getElementById("qText").value = question;
        document.getElementById("optA").value = A;
        document.getElementById("optB").value = B;
        document.getElementById("optC").value = C;
        document.getElementById("optD").value = D;
        document.getElementById("correct").value = correct;
    }

    function extractOpt(lines, symbol) {
        let line = lines.find(l => l.startsWith(symbol));
        return line ? line.replace(symbol, "").trim() : "";
    }


    function submitQuestion() {
        const payload = {
            quiz_id: <?= (int)$quiz_id ?>,
            question: document.getElementById("qText").value.trim(),
            A: document.getElementById("optA").value.trim(),
            B: document.getElementById("optB").value.trim(),
            C: document.getElementById("optC").value.trim(),
            D: document.getElementById("optD").value.trim(),
            correct: document.getElementById("correct").value,
        };

        fetch("<?= url('index.php?route=/admin/questions/import-text/store') ?>", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(payload)
            })
            .then(r => r.text().then(t => ({
                ok: r.ok,
                text: t
            })))
            .then(res => {
                if (!res.ok) {
                    showMsg("خطا: " + res.text, "danger");
                    return;
                }
                showMsg("سؤال با موفقیت ثبت شد.", "success");
            })
            .catch(err => showMsg("خطای ارتباط با سرور: " + err, "danger"));
    }

    function showMsg(txt, type) {
        document.getElementById("msgBox").innerHTML =
            `<div class="alert alert-${type}">${txt}</div>`;
    }
</script>
<div class="container mt-4">
    <a href="index.php?route=/admin/questions&quiz_id=<?= $quiz_id ?>" class="btn btn-outline-secondary mt-3">
        بازگشت به لیست سؤالات
    </a>
    <h3 class="mb-3">افزودن سؤال از طریق متن (آزمون شماره <?= e($quiz_id) ?>)</h3>

    <div class="mb-3">
        <label class="form-label fw-bold">متن سؤال + گزینه‌ها</label>
        <textarea id="rawInput" class="form-control" rows="10" placeholder="مثال:
برای کوچک‌ترین مقدار از چه تابعی استفاده میشود؟
الف) MIN
ب) SMALL
ج) LOW
د) LEAST
پاسخ: الف"></textarea>
    </div>

    <button class="btn btn-primary" onclick="parseQuestion()">استخراج</button>

    <hr>

    <h4 class="fw-bold">پیش‌نمایش و ویرایش</h4>

    <div class="mb-3">
        <label class="form-label">متن سؤال</label>
        <input id="qText" class="form-control" />
    </div>

    <div class="row g-2 mb-3">
        <div class="col-md-6">
            <label>A</label>
            <input id="optA" class="form-control">
        </div>
        <div class="col-md-6">
            <label>B</label>
            <input id="optB" class="form-control">
        </div>

        <div class="col-md-6">
            <label>C</label>
            <input id="optC" class="form-control">
        </div>
        <div class="col-md-6">
            <label>D</label>
            <input id="optD" class="form-control">
        </div>
    </div>

    <label class="form-label">پاسخ صحیح</label>
    <select id="correct" class="form-select w-25 mb-3">
        <option value="">انتخاب کنید...</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
    </select>

    <button class="btn btn-success" onclick="submitQuestion()">ثبت سؤال</button>


    <div id="msgBox" class="mt-3"></div>
    <a href="index.php?route=/admin/questions&quiz_id=<?= $quiz_id ?>" class="btn btn-outline-secondary mt-3">
        بازگشت به لیست سؤالات
    </a>
</div>