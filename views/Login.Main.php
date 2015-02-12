<div class="modal-window" id="modal-window" style="display: none; width: 450px; height: 350px">
	<h1>Log In</h1>
	<div class="content">
		<section id="login">
			<form action="login/user_authentication" method="post" id="loginForm" class="validate">
				<label for="inputLoginUsername">E-mail Address</label>
				<input type="text" name="username" id="inputLoginUsername" class="flexible required">
				<label for="inputLoginPassword">Password</label>
				<input type="password" name="password" id="inputLoginPassword" class="flexible required">
				<label for="inputLoginServer">Server</label>
				<select name="server" id="inputLoginServer" class="large">
					<option value="1">Local Server 1</option>
					<option value="2">Local Server 2</option>
					<option value="3">Local Server 3</option>
				</select>
				<div style="padding: 10px 0">
					<input type="submit" value="Enter" style="margin: auto">
				</div>
			</form>
		</section>
	</div>
</div>
