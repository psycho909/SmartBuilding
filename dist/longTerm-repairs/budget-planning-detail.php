<?php session_start(); ?>
<?php
	include('../config.php');
	include('../Header.php');
	if (!$_SESSION['online']) {
		$url = "$urlName/login.php";
		header("Location: " . $url);
	}
	$db = new DBAccess($conf['db']['dsn'], $conf['db']['user']);
	$_isAdmin = $_SESSION['admin'];
	$bank_acc_no = $_GET['bank_acc_no'];
	// echo $bank_acc_no;
?>
<?php

$sql = "SELECT a.*,b.type FROM bank_acc a, bank_acc_type b WHERE a.account_type = b.id AND a.id = $bank_acc_no";

$account = $db->getRow($sql);
session_start();

if (strlen($_SESSION['account']) == 0) {
	header('Location: ' . '/smartbuilding/login.php');
}

?>
<!-- 內容切換區 -->
<div class="row">
	<div class="col-12 p-4">
		<div class="asset-manage-wrapper">
            <ul class="nav nav-pills mb-3">
				<li class="nav-item">
					<a class="nav-link" href="<?= $urlName ?>/longTerm-repairs/budget.php">年度預算</a>
                </li>
                <li class="nav-item">
					<a class="nav-link active" href="<?= $urlName ?>/longTerm-repairs/budget-planning.php">財務籌措</a>
                </li>
                <li class="nav-item">
					<a class="nav-link" href="<?= $urlName ?>/longTerm-repairs/bank-acc.php">銀行專戶</a>
                </li>
			</ul>
			<div id="assets-tab">

				<a href="<?= $urlName ?>/longTerm-repairs/budget-planning.php" class="btn add-asset-btn mb-3">
					<span>+</span>執行率
                </a>

				<table class="table asset-table0">
					<thead class="thead-light">
						<tr>
							<th>專戶用途</th>
							<th>專戶類型</th>
							<th>銀行名稱</th>
							<th>帳戶編號</th>
							<th>帳戶餘額</th>
							<th>決算數</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><span><?=$account[account_purpose];?></span></td>
							<td><span><?=$account[type];?></span></td>
							<td><span><?=$account[bank_name];?></span></td>
							<td><span><?=$account[account_number];?></span></td>
							<td><span><?=number_format($account[account_balance]);?></span></td>
							<?php
								$sql = 'SELECT SUM(a.amount) as total FROM budget a, bank_acc b WHERE a.bank_acc_no = ' . $account[id];
								$tt = $db->getRow($sql);
								$required = $tt['total'] == 0 ? '' : number_format($tt['total']);
								$formatter = new NumberFormatter('en_US', NumberFormatter::PERCENT);
								$p = $formatter->format($account['account_balance']/$tt['total']);
								$p = $p == 0 ? '' : $p;
							?>
							<td><?=$required;?></td>
						</tr>
					</tbody>
				</table>
				<table class="table asset-table">
					<thead class="thead-light">
						<tr>
							<th>預算名稱</th>
							<th>編列日期</th>
							<th>預算金額</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql = 'SELECT a.name,a.planning_dt AS dt,a.amount,b.bank_name,b.account_number,b.account_purpose,b.account_balance FROM budget a, bank_acc b WHERE a.bank_acc_no = b.id AND a.bank_acc_no = ' . $account['id'];
							$data1 = $db->getRows($sql);
							foreach($data1 as $var) {
						?>
						<tr>
							<td><span><?=$var['name'];?></span></td>
							<td><span><?=$var['dt'];?></span></td>
							<td><span><?=number_format($var['amount']);?></span></td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script>
$('.asset-table').DataTable({
	"language": {
		"search": "搜尋_INPUT_",
		"searchPlaceholder": "搜尋資產...",
		"info": "從 _START_ 到 _END_ /共 _TOTAL_ 筆資料",
		"infoEmpty": "",
		"emptyTable": "目前沒有資料",
		"lengthMenu": "每頁顯示 _MENU_ 筆資料",
		"zeroRecords": "搜尋無此資料",
		"infoFiltered": " 搜尋結果 _MAX_ 筆資料",
		"paginate": {
			"previous": "上一頁",
			"next": "下一頁",
			"first": "第一頁",
			"last": "最後一頁"
		}
	},
	"deferRender": true,
	"processing": true,
	"ordering": false,
	"searching": false,
	"paging": false,
})
</script>
<?php include('../Footer.php'); ?>