<?php $rowNumber = 1; ?>

<?php 

function getPriority($priority) {
    switch($priority) {
        case 1:
            return "Bardzo niski";
        case 2:
            return "Niski";
        case 3:
            return "Sredni";
        case 4:
            return "Wysoki";
        case 5:
            return "Bardzo wysoki";
    }
}

?>

<div>
    <h1>Tasks: </h1>

    <form method="post" action="">
        <input type="hidden" name="action" value="add">
        <input type="submit" name="addTaskButton" value="Dodaj zadanie">
    </form>

    <?php if (!empty($rows)): ?>
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>Ukończone</th>
                    <th>Opis</th>
                    <th>Data utworzenia</th>
                    <th>Data terminu</th>
                    <th>Priorytet</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($rows as $row): ?>
                <tr>
                    <td><?php echo $rowNumber++; ?></td>
                    <td>
                        <form method="post" action="">
                            <input type="hidden" name="action" value="updateCheck">
                            <input type="hidden" name="taskId" value="<?php echo $row['task_id']; ?>">
                            <input type="checkbox" name="completedCheckBox" <?php echo $row['completed'] ? 'checked' : ''; ?> onclick="this.form.submit();">
                        </form>
                    </td>
                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                    <td><?php echo htmlspecialchars($row['creation_date']); ?></td>
                    <td><?php echo htmlspecialchars($row['deadline_date']); ?></td>
                    <td><?php echo htmlspecialchars(getPriority($row['priority'])); ?></td>
                    <td>
                        <form method="post" action="">
                            <input type="hidden" name="action" value="update">
                            <input type="hidden" name="taskId" value="<?php echo $row['task_id']; ?>">
                            <input type="submit" name="updateTaskButton" value="Modyfikuj">
                        </form>
                    </td>
                    <td>
                        <form method="post" action="">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="taskId" value="<?php echo $row['task_id']; ?>">
                            <input type="submit" name="deleteTaskButton" value="Usuń">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <h1>Nie ma zadan :D</h1>
    <?php endif; ?>
</div>