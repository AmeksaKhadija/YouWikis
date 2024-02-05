<?php 
require_once ('../Controller/WikiController.php');
$wikicontroller = new WikiController();
$wikis = $wikicontroller->getAllwikis();
$categories = $wikicontroller->getAllCategories();
$tags = $wikicontroller->getAlltags();
// print_r($tags);

?>


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="../Helprs/wikiHelprs.php" method="POST">


        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter wiki</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nomCategorie" class="form-label">Title :</label>
                        <input type="text" class="form-control" id="nomCategorie" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="nomCategorie" class="form-label">content:</label>
                        <input type="text" class="form-control" id="nomCategorie" name="content" required>
                    </div>

                    <select class="form-control" name="category_id" data-placeholder="choose a category">
                        <?php foreach ($categories as $category) : ?>
                        <option value="<?php echo $category['id_categorie']; ?>"><?php echo $category['nom']; ?>
                        </option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="">
                    <select class="js-example-basic-multiple form-control" name="tags[]" multiple="multiple"
                        data-placeholder="Choose tags">
                        <?php foreach ($tags as $tag) : ?>
                        <option value="<?php echo $tag['id_tag']; ?>"><?php echo $tag['nom']; ?></option>
                        <?php endforeach ?>
                    </select>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-secondary" name="submit">Save changes</button>

                    </div>
                </div>
            </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>



<style>
<style>body {
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
    font-family: 'Arial', sans-serif;
}

.modal-dialog {
    max-width: 700px;
}

.modal-content {
    border-radius: 2px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.modal-header {
    background-color: #343a40;
    color: white;
    border-bottom: 1px solid #dee2e6;
}

.modal-body {
    padding: 20px;
}

.form-label {
    font-weight: bold;
    color: #343a40;
}

.form-control {
    margin-bottom: 15px;
    border: 1px solid #ced4da;
    border-radius: 5px;
}

.select2-container {
    width: 100% !important;
}

.modal-footer {
    border-top: 1px solid #dee2e6;
    justify-content: flex-start;
}

.btn-secondary {
    background-color: #343a40;
    color: white;
    border: 1px solid #343a40;
    border-radius: 5px;
}

.btn-secondary:hover {
    background-color: #23272b;
    border: 1px solid #23272b;
}
</style>

</body>

</html>