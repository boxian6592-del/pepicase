<!DOCTYPE html>
<html>
<head>
    <title>Test DB</title>
</head>
<body>
    <h1>Test DB</h1>
    <?php if (!empty($data)): ?>
        <table>
            <thead>
                <tr>
                    <?php foreach ($data[0] as $key => $value): ?>
                        <th><?= $key ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <?php foreach ($row as $value): ?>
                            <td><?= $value ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Không có dữ liệu từ hàm testdb()</p>
    <?php endif; ?>
</body>
</html>
