<form method="post" action="" name="form">
    <input type="hidden" name="action" value="update">
    <h2>Modyfikacja</h2>
    <input type="hidden" name="taskId" value="<?php echo $row['task_id']; ?>">

    <label for="newDescription">Opis:</label>
    <input type="text" id="newDescription" name="newDescription" value="<?php echo htmlspecialchars($row['description']); ?>" required>

    <label for="newDeadline">Termin:</label>
    <input type="date" id="newDeadline" name="newDeadline" value="<?php echo htmlspecialchars($row['deadline_date']); ?>" required>

    <label for="newPriority">Priorytet:</label>
    <input type="number" id="newPriority" min="1" max="5" name="newPriority" value="<?php echo $row['priority']; ?>" required>

    <label for="newPriority">Priorytet:</label>
    <select id="newPriority" name="newPriority" required>
        <option value="1" <?php echo ($row['priority'] === 1) ? 'selected' : ''; ?>>Bardzo niski</option>
        <option value="2" <?php echo ($row['priority'] === 2) ? 'selected' : ''; ?>>Niski</option>
        <option value="3" <?php echo ($row['priority'] === 3) ? 'selected' : ''; ?>>Sredni</option>
        <option value="4" <?php echo ($row['priority'] === 4) ? 'selected' : ''; ?>>Wysoki</option>
        <option value="5" <?php echo ($row['priority'] === 5) ? 'selected' : ''; ?>>Bardzo wysoki</option>
    </select>

    <input type="submit" name="updateData" value="Modyfikuj">
</form>