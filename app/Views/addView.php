<form method="post" action="" name="form"> 
    <h2>Dodaj</h2>
    <label for="description">Opis:</label>
    <input type="text" id="description" name="description" required>

    <label for="deadline">Termin:</label>
    <input type="date" id="deadline" name="deadline" required>

    <label for="priority">Priorytet:</label>
    <input type="number" id="priority" min="1" max="5" name="priority" required>

    <input type="submit" name="addData" value="Dodaj">
</form>