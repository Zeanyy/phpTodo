<form method="post">
    <input type="submit" name="addTaskButton" value="Dodaj zadanie"/>
</form>

<?php $rowNumber = 1 ?>

<h1>Tasks: </h1>

<?php if (!empty($rows)): ?>
    <table>
    <?php foreach($rows as $row): ?>
        <tr>
            <td><?php echo $rowNumber++; ?></td>
            <td><input type="checkbox" name="completed"></td>
            <td><?php echo htmlspecialchars($row['description']); ?></td>
            <td><?php echo htmlspecialchars($row['creation_date']); ?></td>
            <td><?php echo htmlspecialchars($row['deadline_date']); ?></td>
            <td><?php echo htmlspecialchars($row['priority']); ?></td>
            <td><button>Modifykuj</button></td>
            <td><button>Usun</button></td>
        </tr>
    <?php endforeach; ?>
    </table>
<?php else: ?>
    <li>Ni ma taskow. :c</li>
<?php endif; ?>