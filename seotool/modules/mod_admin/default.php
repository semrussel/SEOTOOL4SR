<div id="mod_admin">
	<div class="row-fluid">
		<div class="span6">
			<div class="widget">
				<div class="widget-header">
					<i class="icon-plus icon-white"></i>
					<h3>Create a user</h3>
				</div>
				<div class="widget-content">
					<div class="row-fluid">
						<input type="text" placeholder = "First name" class="span6"/>
						<input type="text" placeholder = "Last name" class="span6"/>
						<div class="input-prepend">
							<span class="add-on">@</span>
							<input type="text" placeholder = "Username" class="span9" id="prependedInput"/>
						</div>
						<div class="input-prepend">
							<span class="add-on"><i class="icon-lock"></i></span>
							<input type="text" placeholder = "Password" class="span9" id="prependedInput"/>
						</div>
						<input type="text" placeholder = "kung gusto mo baguhin yung width, lagay mo lang: class='span12'" class="span12"/>
						<input type="text" placeholder = "span11" class="span11"/>
						<input type="text" placeholder = "span10" class="span10"/>
						<input type="text" placeholder = "span9" class="span9"/>
						<input type="text" placeholder = "span8" class="span8"/>
						<input type="text" placeholder = "span7" class="span7"/>
						<input type="text" placeholder = "span6 hanggang span1 :)" class="span6"/>
						<input type="submit" class="btn span12" value="Create" />
					</div>
				</div>
			</div>
		</div>
		<div class="span6">
			<div class="widget">
				<div class="widget-header">
					<i class="icon-search icon-white"></i>
					<h3>Advanced Search</h3>
				</div>
				<div class="widget-content">
					Search user with the following details:
					<div class="row-fluid">
						<div class="input-prepend span10">
							<span class="add-on"><i class="icon-user"></i></span>
							<input type="text" placeholder="First Name" id="prependedInput" class="span11"/>
						</div>
						<select class="span2">
							<option value="or">OR</option>
							<option value="and">AND</option>
						</select>
					</div>
					<div class="row-fluid">
						<div class="input-prepend span10">
							<span class="add-on"><i class="icon-user"></i></span>
							<input type="text" placeholder="Last Name" id="prependedInput" class="span11"/>
						</div>
						<select class="span2">
							<option value="or">OR</option>
							<option value="and">AND</option>
						</select>
					</div>
					<div class="row-fluid">
						<div class="input-prepend span10">
							<span class="add-on">@</span>
							<input type="text" placeholder="Username" id="prependedInput" class="span11"/>
						</div>
						<select class="span2">
							<option value="or">OR</option>
							<option value="and">AND</option>
						</select>
					</div>	
					<div class="row-fluid">
						<div class="input-prepend span10">
							<span class="add-on"><i class="icon-briefcase"></i></span>
							<input type="text" placeholder="Company" id="prependedInput" class="span11"/>
						</div>
						<select class="span2">
							<option value="or">OR</option>
							<option value="and">AND</option>
						</select>
					</div>
					<div class="row-fluid">
						<div class="span10"></div>
						<div class="span2">
							<button class="btn">Go!</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span12">
				<div class="widget">
					<div class="widget-header">
						<i class="icon-user icon-white"></i>
						<h3>All users</h3>
					</div>
					<div class="widget-content">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th></th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Username</th>
									<th>Email address</th>
									<th>Company</th>
									<th class="sort_by pull-right">Sort by:
										<button class="btn" title="Name"><i class="icon-user"></i></button>
										<button class="btn" title="Email Address"><i class="icon-envelope"></i></button>
										<button class="btn" title="Username" id="sort_dateupload">@</button>
										<button class="btn" title="Company" id="sort_dateupload"><i class="icon-briefcase"></i></button>
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>data</td>
									<td>data</td>
									<td>data</td>
									<td>data</td>
									<td>data</td>
									<td class="pull-right">
										<button class="btn btn-primary" title="Edit this user"><i class="icon-edit"></i></button>
										<button class="btn btn-danger" title="Delete this user"><i class="icon-remove"></i></button>
									</td>
								</tr>
								<tr>
									<td>2</td>
									<td>data</td>
									<td>data</td>
									<td>data</td>
									<td>data</td>
									<td>data</td>
									<td class="pull-right">
										<button class="btn btn-primary" title="Edit this user"><i class="icon-edit"></i></button>
										<button class="btn btn-danger" title="Delete this user"><i class="icon-remove"></i></button>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>