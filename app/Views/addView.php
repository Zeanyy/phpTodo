<form method="post" action="" name="form"> 
    <input type="hidden" name="action" value="add">
    <h2>Dodaj</h2>
    <label for="description">Opis:</label>
    <input type="text" id="description" name="description" required>

    <label for="deadline">Termin:</label>
    <input type="date" id="deadline" name="deadline" required>

    <label for="priority">Priorytet:</label>
    <select id="priority" name="priority" required>
        <option value="1">Bardzo niski</option>
        <option value="2">Niski</option>
        <option value="3" selected>Sredni</option>
        <option value="4">Wysoki</option>
        <option value="5">Bardzo wysoki</option>
    </select>

    <input type="submit" name="addData" value="Dodaj">
</form>