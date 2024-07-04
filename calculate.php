<!DOCTYPE html>
<html>
<head>
    <title>ตารางสูตรคูณ</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            width: 25%;
            vertical-align: top;
            padding: 5px;
            border: 1px solid black;
        }
        .multiplication-table {
            padding: 2px;
        }
    </style>
</head>
<body>
    <form method="get" action="">
        <label for="start">ใส่เลขเริ่มต้น:</label>
        <input type="number" name="start" id="start" required>
        <label for="end">ใส่เลขสิ้นสุด:</label>
        <input type="number" name="end" id="end" required>
        <input type="submit" value="สร้างตาราง">
    </form>

    <?php
    if (isset($_GET["start"]) && isset($_GET["end"])) {
        $start = intval($_GET["start"]);
        $end = intval($_GET["end"]);

        if ($start > 0 && $end >= $start) {
            echo "<table>";
            for ($j = $start; $j <= $end; $j++) {
                if (($j - $start) % 4 == 0) echo "<tr>";
                echo "<td>";
                for ($i = 1; $i <= 12; $i++) {
                    echo "<div class='multiplication-table'>$i x $j = " . ($i * $j) . "</div>";
                }
                echo "</td>";
                if (($j - $start) % 4 == 3) echo "</tr>";
            }
            if (($end - $start) % 4 != 3) echo "</tr>";
            echo "</table>";
        } else {
            echo "กรุณาใส่ค่าที่ถูกต้อง.";
        }
    }
    ?>
</body>
</html>
