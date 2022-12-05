<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin bác sĩ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
        <div class="row"></div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Thông tin bác sĩ: <?= $doctor["FNAME"] . ' ' . $doctor['LNAME']; ?>
                        <a href="?controller=doctor&action=index" class="btn btn-primary float-end">Quay trở lại</a>
                    </h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                        <label>ID</label>
                        <p class="form-control">
                            <?= $doctor["S_ID"]; ?>
                        </p>
                        </div>
                        <div class="mb-3">
                        <label>Tên bác sĩ</label>
                        <p class="form-control">
                            <?= $doctor["FNAME"] . ' ' . $doctor['LNAME']; ?>
                        </p>
                        </div>
                        <div class="mb-3">
                            <label>Ngày sinh</label>
                            <p class="form-control">
                                <?= str_replace('/','-' , date('d/m/Y', strtotime($doctor["BDATE"]))); ?>
                            </p>                                
                        </div>
                        <div class="mb-3">
                            <label>Giới tính</label>
                            <p class="form-control">
                                <?= $doctor["SEX"]; ?>
                            </p>                                
                        </div>
                        <div class="mb-3">
                            <label>Địa chỉ</label>
                            <p class="form-control">
                                <?= $doctor["ADDRESS"]; ?>
                            </p>                                
                        </div>
                        <div class="mb-3">
                            <label>Số điện thoại</label>
                            <p class="form-control">
                                <?= $doctor["PHONE_NUMBER"]; ?>
                            </p>                                
                        </div>
                        <div class="mb-3">
                            <label>Địa chỉ Email</label>
                            <p class="form-control">
                                <?= $doctor["EMAIL"]; ?>
                            </p>                                
                        </div>
                        <div class="mb-3">
                            <label>Ngày bắt đầu làm việc</label>
                            <p class="form-control">
                                <?= str_replace('/','-' , date('d/m/Y', strtotime($doctor["START_DATE"]))); ?>
                            </p>                                
                        </div>
                        <div class="mb-3">
                            <label>Số năm kinh nghiệm làm việc</label>
                            <p class="form-control">
                                <?= $doctor["EXPERIENCE_JOB"]; ?>
                            </p>                                
                        </div>
                        <div class="mb-3">
                            <label>Phòng làm việc</label>
                            <p class="form-control">
                                <?= $doctor["ROOM_ID"] . $doctor["BUIL_ID"]; ?>
                            </p>                                
                        </div>
                        
                </div>
                </div>
            </div>
        </div>
    </div> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
</body>
</html>