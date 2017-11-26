 <form method = "POST" id = "search_form">
        <table align="center" style="margin: 20px auto;">
			<tr>
				<td>
                    Form: 
                </td>
				<td>
                    <select name="f_day">
							<option disabled selected value>day</option>
						<?php for ($i = 1; $i <= 31; $i++) : ?>
							<option value="<?php $value = str_pad($i,2,"0",STR_PAD_LEFT); echo $value ?>"><?php echo $value; ?></option>
						<?php endfor; ?>
					</select>
                </td>
				<td>
                      <select name="f_month">
							<option disabled selected value>month</option>
						<?php for ($i = 1; $i <= 12; $i++) : ?>
							<option value="<?php $value = str_pad($i,2,"0",STR_PAD_LEFT); echo $value ?>"><?php echo $value; ?></option>
						<?php endfor; ?>
					</select>
                </td>
				<td>
                      <select name="f_year">
							<option disabled selected value>year</option>
						<?php for ($i = 2015; $i <= 2050; $i++) : ?>
							<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php endfor; ?>
					</select>
                </td>
				<td>    </td>
				<td>
				    To: 
                </td>
				<td>
                    <select name="t_day">
							<option disabled selected value>day</option>
						<?php for ($i = 1; $i <= 31; $i++) : ?>
							<option value="<?php $value = str_pad($i,2,"0",STR_PAD_LEFT); echo $value ?>"><?php echo $value; ?></option>
						<?php endfor; ?>
					</select>
                </td>
				<td>
                      <select name="t_month">
							<option disabled selected value>month</option>
						<?php for ($i = 1; $i <= 12; $i++) : ?>
							<option value="<?php $value = str_pad($i,2,"0",STR_PAD_LEFT); echo $value ?>"><?php echo $value; ?></option>
						<?php endfor; ?>
					</select>
                </td>
				<td>
                      <select name="t_year">
							<option disabled selected value>year</option>
						<?php for ($i = 2015; $i <= 2050; $i++) : ?>
							<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php endfor; ?>
					</select>
                </td>
				<td>     </td>
				<td><input type="submit" value="Search" id = "search"></td>
			</tr>	
		</table>
        </form>