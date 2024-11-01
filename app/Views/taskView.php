<?php $rowNumber = 1; ?>

<div>
    <h1>Tasks: </h1>

    <form method="post" action="">
        <input type="submit" name="addTaskButton" value="Dodaj zadanie" />
    </form>

    <?php if (!empty($rows)): ?>
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>Ukończone</th>
                    <th>Opis</th>
                    <th>Data utworzenia</th>
                    <th>Termin</th>
                    <th>Priorytet</th>
                    <th rowspan="2">Akcje</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($rows as $row): ?>
                <tr>
                    <td><?php echo $rowNumber++; ?></td>
                    <td><input type="checkbox" name="completed"></td>
                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                    <td><?php echo htmlspecialchars($row['creation_date']); ?></td>
                    <td><?php echo htmlspecialchars($row['deadline_date']); ?></td>
                    <td><?php echo htmlspecialchars($row['priority']); ?></td>
                    <td>
                        <form method="post" action="">
                            <input type="hidden" name="taskId" value="<?php echo $row['task_id']; ?>">
                            <input type="submit" name="updateTaskButton" value="Modyfikuj">
                        </form>
                    </td>
                    <td>
                        <form method="post" action="">
                            <input type="hidden" name="taskId" value="<?php echo $row['task_id']; ?>">
                            <input type="submit" name="deleteTaskButton" value="Usuń">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <h1>Nie ma zadań. :c</h1>
    <?php endif; ?>
</div>