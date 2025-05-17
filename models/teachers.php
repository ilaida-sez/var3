<?php
require_once 'header.php';
require_once 'config/database.php';

$db = new Database();
$stmt = $db->query("
    SELECT 
        id_teachers,
        surname,
        name,
        patronomyc,
        login
    FROM teachers
    ORDER BY surname, name
");

$teachers = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
?>

<div class="content">
    <h1>Преподаватели</h1>
    
    <div class="actions">
        <button class="btn" onclick="location.href='add_teacher.php'">Добавить</button>
    </div>
    
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Фамилия</th>
                    <th>Имя</th>
                    <th>Отчество</th>
                    <th>Логин</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($teachers as $teacher): ?>
                <tr>
                    <td><?= htmlspecialchars($teacher['surname']) ?></td>
                    <td><?= htmlspecialchars($teacher['name']) ?></td>
                    <td><?= htmlspecialchars($teacher['patronomyc']) ?></td>
                    <td><?= htmlspecialchars($teacher['login']) ?></td>
                    <td>
                        <button class="btn-sm" 
                                onclick="location.href='edit_teacher.php?id=<?= $teacher['id_teachers'] ?>'">
                            Изменить
                        </button>
                        <button class="btn-sm btn-danger" 
                                onclick="confirmDelete(<?= $teacher['id_teachers'] ?>)">
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
    if (confirm('Вы уверены, что хотите удалить этого преподавателя?')) {
        location.href = 'delete_teacher.php?id=' + id;
    }
}
</script>

<?php require_once 'footer.php'; ?>