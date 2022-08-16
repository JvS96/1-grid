
<span class="close">&times;</span>
<h1>Add new issues</h1>
<form method="POST" action="modal/issue_modal_action.php">
    <div class='row'>
        <div class='col-md-12'>
            <div class='col-md-6'>
                <div class="form-group">
                    <label for="number">Number</label>
                    <input type="text" class="form-control" name="number" placeholder="Number">
                </div>
            </div>
            <div class='col-md-6'>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title">
                </div>
            </div>
        </div>
        <div class='col-md-12'>
            <div class='col-md-6'>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" name="description" placeholder="Description">
                </div>
            </div>
            <div class='col-md-6'>
                <div class="form-group">
                    <label for="client">Client</label>
                    <select name="client" class="form-control">
                        <option value="C: Client ABC">Client ABC</option>
                        <option value="C: Client XYZ">Client XYZ</option>
                        <option value="C: Client MNO">Client MNO</option>
                    </select>
                </div>
            </div>
        </div>
        <div class='col-md-12'>
            <div class='col-md-6'>
                <div class="form-group">
                    <label for="priority">Priority</label>
                    <select name="priority" class="form-control">
                        <option value="P: Low">Low</option>
                        <option value="P: Medium">Medium</option>
                        <option value="P: High">High</option>
                    </select>
                </div>
            </div>
            <div class='col-md-6'>
                <div class="form-group">
                    <label for="type">Type</label>
                    <select name="type" class="form-control">
                        <option value="T: Bug">Bug</option>
                        <option value="T: Support">Support</option>
                        <option value="T: Enhancement">Enhancement</option>
                    </select>
                </div>
            </div>
        </div>
        <div class='col-md-12'>
            <div class='col-md-6'>
                <div class="form-group">
                    <label for="assigned">Assigned to</label>
                    <input type="text" class="form-control" name="assigned" placeholder="Assigned to">
                </div>
            </div>
            <div class='col-md-6'>
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" name="status" placeholder="Status">
                </div>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

