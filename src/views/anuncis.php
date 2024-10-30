<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anuncis Classificats</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/anuncis.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1>Anuncis Classificats</h1>
        <p>Aquesta secció permet publicar i gestionar anuncis classificats per fomentar la reutilització.</p>
        <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">Crear Anunci</button>

        <h2 class="mt-4">Els Teus Anuncis</h2>
        <ul id="anuncisList" class="list-group">
      
        </ul>
    </div>

    <!-- Modal Crear Anunci -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Crear Anunci</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="anunciForm" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Títol:</label>
                            <input type="text" class="form-control" name="title" id="title" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Descripció (markdown):</label>
                            <textarea class="form-control" name="description" id="description" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="images">Imatges:</label>
                            <input type="file" class="form-control-file" name="images[]" id="images" multiple accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="category">Categoria:</label>
                            <select class="form-control" name="category" id="category">
                                <option value="mobles">Mobles</option>
                                <option value="electrodomestics">Electrodomèstics</option>
                                <option value="llibres">Llibres</option>
                                <option value="roba">Roba</option>
                                <option value="joguines">Joguines</option>
                                <option value="altres">Altres</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Estat de l'Anunci:</label>
                            <select class="form-control" name="status" id="status">
                                <option value="esborrany">Esborrany</option>
                                <option value="public">Públic</option>
                                <option value="caducat">Caducat</option>
                                <option value="esborrat">Esborrat</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tancar</button>
                    <button type="button" class="btn btn-primary" id="saveAnunci">Publicar Anunci</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Editar Anunci -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Anunci</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <div class="form-group">
                            <label for="editTitle">Títol:</label>
                            <input type="text" class="form-control" name="editTitle" id="editTitle" required>
                        </div>
                        <div class="form-group">
                            <label for="editDescription">Descripció:</label>
                            <textarea class="form-control" name="editDescription" id="editDescription" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="editImages">Imatges:</label>
                            <input type="file" class="form-control-file" name="editImages[]" id="editImages" multiple accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="editCategory">Categoria:</label>
                            <select class="form-control" name="editCategory" id="editCategory">
                                <option value="mobles">Mobles</option>
                                <option value="electrodomestics">Electrodomèstics</option>
                                <option value="llibres">Llibres</option>
                                <option value="roba">Roba</option>
                                <option value="joguines">Joguines</option>
                                <option value="altres">Altres</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="editStatus">Estat de l'Anunci:</label>
                            <select class="form-control" name="editStatus" id="editStatus">
                                <option value="esborrany">Esborrany</option>
                                <option value="public">Públic</option>
                                <option value="caducat">Caducat</option>
                                <option value="esborrat">Esborrat</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tancar</button>
                    <button type="button" class="btn btn-primary" id="updateAnunci">Desa Canvis</button>
                </div>
            </div>
        </div>
    </div>

    <script src="public/js/anuncis.js"></script>
</body>
</html>
