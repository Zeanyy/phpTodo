<form method="post" action="">
    <input type="hidden" name="taskId" value="<?php echo $row['task_id']; ?>">
    <input type="text" name="newDescription" value="<?php echo $row['description']; ?>">
    <input type="date"  name="newDeadline" value="<?php echo $row['deadline_date']; ?>">
    <input type="number" min = "1" max = "5" name="newPriority" value="<?php echo $row['priority']; ?>">
    <input type="submit" name="updateData" value="Modyfikuj">
</form>