<div class="container">
  <h1>Add new Data</h1>
  <form action="javascript:void(0)" id="formAddData">
  <div class="form-group">
      <label for="abtitle">Title:</label>
      <input name="title" type="text" class="form-control" id="abtitle" placeholder="Enter the title" required>
    </div>
    <div class="form-group">
      <label for="abcat">Category:</label>
      <select name="category" id="abcat" class="form-control" required>
          <option value="" disabled selected>Select category</option>
          <option value="news">News</option>
          <option value="art">Art</option>
          <option value="tech">Tech</option>
          <option value="sport">Sport</option>
          <option value="health">Health</option>
      </select>
    </div>
    <div class="form-group">
      <label for="abdisc">Description:</label>
      <textarea name="desc" class="form-control" rows="5" id="abdisc" placeholder="Enter the description" required></textarea>
    </div>
    <button class="btn btn-primary" type="submit">Add data</button>
  </form>
</div>