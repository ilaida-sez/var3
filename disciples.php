<?php
require_once 'header.php';
require_once 'config/database.php';

$db = new Database();
$stmt = $db->query("
    SELECT 
        s.name AS discipline, 
        g.name AS group_name,
        COUNT(p.id_program) AS topics,
        SUM(tw.hours_total) AS hours
    FROM subjects s
    JOIN teachers_workload tw ON s.id_subjects = tw.id_subjects
    JOIN `group` g ON tw.id_group = g.id_group
    LEFT JOIN program p ON s.id_subjects = p.id_subjects AND g.id_group = p.id_group
    GROUP BY s.name, g.name
    ORDER BY s.name, g.name
");

$disciplines = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
?>

<div class="content">
    <h1>Дисциплины</h1>
    
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>№</th>
                    <th>Дисциплина</th>
                    <th>Группа</th>
                    <th>Темы</th>
                    <th>Часы</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($disciplines as $i => $row): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= htmlspecialchars($row['discipline']) ?></td>
                    <td><?= htmlspecialchars($row['group_name']) ?></td>
                    <td><?= htmlspecialchars($row['topics']) ?></td>
                    <td><?= htmlspecialchars($row['hours']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once 'footer.php'; ?>