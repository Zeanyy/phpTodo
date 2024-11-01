<form method="post" action="" name="form">
    <h2>Modyfikacja</h2>
    <input type="hidden" name="taskId" value="<?php echo $row['task_id']; ?>">

    <label for="newDescription">Opis:</label>
    <input type="text" id="newDescription" name="newDescription" value="<?php echo htmlspecialchars($row['description']); ?>" required>

    <label for="newDeadline">Termin:</label>
    <input type="date" id="newDeadline" name="newDeadline" value="<?php echo htmlspecialchars($row['deadline_date']); ?>" required>

    <label for="newPriority">Priorytet:</label>
    <input type="number" id="newPriority" min="1" max="5" name="newPriority" value="<?php echo $row['priority']; ?>" required>

    <input type="submit" name="updateData" value="Modyfikuj">
</form>