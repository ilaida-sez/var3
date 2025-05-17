<?php
require_once 'header.php';
require_once 'config/database.php';

$db = new Database();
$stmt = $db->query("
    SELECT 
        s.id_students,
        s.surname,
        s.name,
        s.patronomyc,
        s.dateoff,
        g.name AS group_name
    FROM students s
    JOIN `group` g ON s.id_group = g.id_group
    ORDER BY s.surname, s.name
");

$students = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
?>

<div class="content">
    <h1>Студенты</h1>
    
    <div class="actions">
        <button class="btn" onclick="location.href='add_student.php'">Добавить</button>
    </div>
    
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Фамилия</th>
                    <th>Имя</th>
                    <th>Отчество</th>
                    <th>Группа</th>
                    <th>Дата отчисления</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= htmlspecialchars($student['surname']) ?></td>
                    <td><?= htmlspecialchars($student['name']) ?></td>
                    <td><?= htmlspecialchars($student['patronomyc']) ?></td>
                    <td><?= htmlspecialchars($student['group_name']) ?></td>
                    <td><?= $student['dateoff'] ? htmlspecialchars($student['dateoff']) : '-' ?></td>
                    <td>
                        <button class="btn-sm" 
                                onclick="location.href='edit_student.php?id=<?= $student['id_students'] ?>'">
                            Изменить
                        </button>
                        <button class="btn-sm btn-danger" 
                                onclick="confirmDelete(<?= $student['id_students'] ?>)">
                            Удалить
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
function confirmDelete(id) {
    if (confirm('Вы уверены, что хотите удалить этого студента?')) {
        location.href = 'delete_student.php?id=' + id;
    }
}
</script>

<?php require_once 'footer.php'; ?>