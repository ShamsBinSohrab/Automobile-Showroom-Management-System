<style>

td{
	text-align : justify;
}
input{
	width: 140px;
}
	
</style>

<!DOCTYPE html>
<html>

<body>
	<table style="width:30%" cellpadding="15" align="center">

				<tr>
						<form action = "../accounts/profitandloss.php">
								<td align = "center">
									<input type = "submit" value = "Browse Profit Loss"/>
								</td>
						</form>
					</tr>
					<tr>
						<form action = "../sales/inventory.php">
								<td align = "center">
									<input type = "submit" value = "Browse Inventory"/>
								</td>
						</form>
					</tr>
				<tr>	
					<tr>
						<form action = "../admin/browse_user.php">
								<td align = "center">
									<input type = "submit" value = "Browse User"/>
								</td>
						</form>
					</tr>
					<tr>
						<form action = "../admin/add_user.php">
								<td align = "center">
									<input type = "submit" value = "Add User"/>
								</td>
						</form>
					</tr>
					<tr>
						<form action = "../admin/publish_notice.php">
								<td align = "center">
									<input type = "submit" value = "Publish Offer"/>
								</td>
						</form>
					</tr>
					<tr>
						<form action="../admin/show_offer.php">
							<td>
								<input type="submit" value="Show Offers" id="button_show_offer"/>
							</td>
						</form>
					</tr>					
					<tr>
						<form action = "../logout.php">
							<td align = "center">
								<input type = "submit" value = "Log Out"/>
							</td>

						</form>
					</tr>
			</table>
</body>
</html>