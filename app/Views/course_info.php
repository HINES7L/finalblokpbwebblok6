<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Guru</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .site-header {
            background-color: #343a40;
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
            border-radius: 10px;
        }
        .form-container {
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <header class="site-header mb-4">
        <div class="container">
            <h2 class="mb-0">Info Guru</h2>
        </div>
    </header>

    <div class="container">
        <div class="form-container">
            <form>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Created By</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?=$child->created_by_name?>" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Created At</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?=$child->created_at?>" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Updated By</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?=$child->updated_by_name?>" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Updated At</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?=$child->updated_at?>" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Deleted By</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?=$child->deleted_by_name?>" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Deleted At</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?=$child->deleted_at?>" disabled>
                    </div>
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-dark" onclick="history.back()">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>