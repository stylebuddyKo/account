<?php
require __DIR__.'/__connect__db.php';
$title = '列表';

$page_name = 'data_list';
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$page = $page <= 0 ? 1 : $page;
//$page <= 0 ? $page = 1 : '';

$per_page = 5;

$sql = sprintf("SELECT * FROM `account_info` ORDER BY `id` DESC LIMIT %s, %s", ($page - 1)*$per_page, $per_page);
$t_sql = "SELECT COUNT(1) FROM `account_info`";
$t_rs = $mysqli->query($t_sql);
$total_rows = $t_rs->fetch_row()[0];

$pages = ceil($total_rows/$per_page);

$rs = $mysqli->query($sql);

//$row = $rs->fetch_assoc();

?>
<?php include __DIR__.'/__html_head.php'; ?>
    <style>
        .my-remove a {
            color: red;
            font-size: large;
        }

        .my-edit a {
            color: blue;
            font-size: large;
        }
    </style>
<div class="container">
    <?php include __DIR__.'/__navbar.php'; ?>
    <div class="col-12-md" style="margin-top: 50px">
        <div class="row justify-content-md-center">
            <div class="col-md-auto">
                <nav aria-label="Page navigation example" style="margin-top: 20px;">
                    <ul class="pagination">
                        <li class="page-item <?= $page==1 ? 'disabled' : '' ?>" ><a class="page-link" href="?page=1">First</a></li>
                        <li class="page-item <?= $page==1 ? 'disabled' : '' ?>"><a class="page-link" href="?page=<?= $page-1 ?>">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#"><?= $page."/". $pages ?></a></li>
                        <li class="page-item <?= $page==$pages ? 'disabled' : '' ?>"><a class="page-link" href="?page=<?= $page+1 ?>">Next</a></li>
                        <li class="page-item <?= $page==$pages ? 'disabled' : '' ?>"><a class="page-link" href="?page=<?= $pages ?>">Last</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>刪除</th>
            <th>#</th>
            <th>Account</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Birthday</th>
            <th>Email</th>
            <th>Remarks</th>
            <th>編輯</th>
        </tr>
        </thead>
        <tbody>
        <?php while($row = $rs->fetch_assoc() ): ?>
        <tr>
            <td class="my-remove">
                <a href="javascript:delete_it(<?= $row['id'] ?>)">
                    <i class="fa fa-remove"></i>
                </a>
            </td>
            <td><?= $row['id'] ?></td>
            <td><?= $row['account'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['gender'] ?></td>
            <td><?= $row['birthday'] ?></td>
            <td><?= $row['mailbox'] ?></td>
            <td><?= htmlentities($row['remarks']) ?></td>
            <td class="my-edit">
                <a href="data_edit.php?id=<?= $row['id'] ?>">
                    <i class="fa fa-pencil-square-o"></i>
                </a>
            </td>
        </tr>
    <?php endwhile; ?>
        </tbody>
    </table>
        <div class="row justify-content-md-center">
            <div class="col-md-auto">
                <nav aria-label="Page navigation example" style="margin-top: 20px;">
                    <ul class="pagination">
                        <?php for($i=1; $i<=$pages; $i++): ?>
                        <li class="page-item <?= $page==$i ? 'disabled' : '' ?>" >
                            <a class="page-link" href="?page=<?= $i ?>">
                                <?= $i ?>
                            </a>
                        </li>
                        <?php endfor; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
    <script>
        function delete_it(id) {
            if (confirm('確定刪除編號' + id + '的資料?')) {
                location.href = 'data_delete.php?id=' + id;
            }
        }
    </script>
<?php include __DIR__.'/__html_foot.php'; ?>