<div class="container">
  <h1>Plugin description</h1>
  <form action="javascript:void(0)" id="formAddData">
  <div class="form-group">
      <label for="abtitle">Plugin title:</label>
      <input name="title" type="text" class="form-control" id="abtitle" placeholder="Enter the title" required>
    </div>
    <div class="form-group">
      <label for="abcat">Plugin version:</label>
      <select name="version" id="abcat" class="form-control" required>
          <option value="" disabled selected>Select version</option>
          <option value="realize">Realize</option>
          <option value="beta 1">Beta 1</option>
          <option value="beta 2">Beta 2</option>
          <option value="alpha">Alpha</option>
          <option value="gama">Gama</option>
      </select>
    </div>
    <div class="form-group">
      <label for="abdisc">Plugin description:</label>
      <textarea name="desc" class="form-control" rows="5" id="abdisc" placeholder="Enter the description" required></textarea>
    </div>
    <button class="btn btn-primary" type="submit">Update description</button>
  </form>
</div>