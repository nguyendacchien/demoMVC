<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="col-12 col-md-12 mt-2">
    <div class="card">
        <div class="card-header">
           <h3> Update author</h3>
        </div>
        <div class="card-body">
            <div class="col-12">
                <form method="post">
                    <div class="mb-3">
                        <?php if (isset($authors)) {
                            foreach ($authors as $item): ?>
                                <label class="form-label">firstName</label>
                                <input type="text" name="first-name" class="form-control"
                                       value="<?php echo $item->firstName ?>">
                                <?php if (isset($errors['first-name'])): ?>
                                    <p class="text-danger"><?php echo $errors['first-name'] ?></p>
                                <?php endif; ?>


                                <label class="form-label">lastName</label>
                                <input type="text" name="last-name" class="form-control"
                                       value="<?php echo $item->lastName ?>">
                                <?php if (isset($errors['last-name'])): ?>
                                    <p class="text-danger"><?php echo $errors['last-name'] ?></p>
                                <?php endif; ?>


                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email"
                                       value="<?php echo $item->email ?>">
                                <?php if (isset($errors['email'])): ?>
                                    <p class="text-danger"><?php echo $errors['email'] ?></p>
                                <?php endif; ?>


                                <label class="form-label">?????a ch???</label>
                                <input type="date" class="form-control" name="birthdate"
                                       value="<?php echo $item->birthdate ?>">
                                <?php if (isset($errors['birthdate'])): ?>
                                    <p class="text-danger"><?php echo $errors['birthdate'] ?></p>
                                <?php endif; ?>
                            <?php endforeach;
                        } ?>

                    </div>

                    <button type="submit" class="btn btn-primary">L??u</button>
                    <a type="button" href="index.php" class="btn btn-secondary">Quay l???i</a>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>

