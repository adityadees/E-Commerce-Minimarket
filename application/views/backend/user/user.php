
<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-header row">
			<div class="content-header-left col-md-6 col-12 mb-2">
				<h3 class="content-header-title mb-0">Data User</h3>
			</div>
		</div>
		<div class="content-body">
			
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">
								<a class="btn btn-primary" href="" data-toggle="modal" data-target="#modalAdd">Tambah Data</a></h4>
								<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
								<div class="heading-elements">
									<ul class="list-inline mb-0">
										<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
										<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
										<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
										<li><a data-action="close"><i class="ft-x"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="card-content collapse show">
								<div class="card-body card-dashboard">
									<p>
										<?php if($this->session->flashdata('success')){ ?>
											<div class="alert alert-success">
												<a href="#" class="close" data-dismiss="alert">&times;</a>
												<strong>Sukses!</strong> <?php echo $this->session->flashdata('success'); ?>
											</div>
										<?php } else if($this->session->flashdata('error')){?>
											<div class="alert alert-warning">
												<a href="#" class="close" data-dismiss="alert">&times;</a>
												<strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
											</div>
										<?php }?>
									</p>

									<div class="table-responsive">
										<table class="table table-striped table-bordered complex-headers">
											<thead>
												<tr>
													<th>Username</th>
													<th>Email</th>
													<th>Telepon</th>
													<th>Jenis Kelamin</th>
													<th>Role</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($user as $i)  : ?>
													<tr>
														<td><?php echo $i['user_username'];?></td>
														<td><?php echo $i['user_email'];?></td>
														<td><?php echo $i['user_tel'];?></td>
														<td><?php if($i['user_jk']=='L'){echo "Laki - Laki"; } else {echo "Perempuan"; } ?></td>
														<td><?php echo $i['user_role'];?></td>
														<td class=" text-center">
															<div class="btn-group mr-1 mb-1">
																<button type="button" class="btn btn-icon btn-pink dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-info"></i></button>
																<div class="dropdown-menu">
																	<a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalEdit<?php echo $i['user_id']; ?>">Edit</a>
																	<a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalHapus<?php echo $i['user_id']; ?>">Hapus</a>
																	<div class="dropdown-divider"></div>
																	<a class="dropdown-item" href="#">Lihat Detail</a>
																</div>
															</div>
														</td>
													</tr>
												<?php endforeach; ?>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="modal fade text-left" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title" id="myModalLabel34">Tambah User</h3>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="<?php echo base_url()?>BackendC/save_user" method="POST">
						<div class="modal-body">

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Username: </label>
										<input type="text" placeholder="Username" name="username" class="form-control">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Nama: </label>
										<input type="text" placeholder="Nama" name="nama" class="form-control">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Password: </label>
										<input type="password" placeholder="Password" name="password" class="form-control">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Re-Password: </label>
										<input type="password" placeholder="Repassword" name="repassword" class="form-control">
									</div>									

								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Email: </label>
										<input type="email" placeholder="Email Address" name="email" class="form-control">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Jenis Kelamin: </label><br>
										<input type="checkbox" name="jk" class="switch" data-on-label="Male" data-off-label="Female" id="switch12" checked />
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Telepon: </label>
										<input type="tel" name="tel" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Role: </label>
										<select name="role" class="form-control">
											<option value="admin">Admin</option>
											<option value="customer">Customer</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Alamat: </label>
										<textarea name="alamat" class="form-control"></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="close">
							<input type="submit" class="btn btn-outline-primary btn-lg" value="Submit">
						</div>
					</form>
				</div>
			</div>
		</div>
		
		<?php foreach ($user as $i)  : ?>
			<div class="modal fade text-left" id="modalEdit<?php echo $i['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title" id="myModalLabel34">Edit User</h3>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="<?php echo base_url()?>BackendC/edit_user" method="POST">
							<div class="modal-body">

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Username: </label>
											<input type="text" placeholder="Username" name="username" class="form-control" value="<?php echo $i['user_username']; ?>" readonly="readonly">
											<input type="hidden" placeholder="Username" name="user_id" class="form-control" value="<?php echo $i['user_id']; ?>" readonly="readonly">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Nama: </label>
											<input type="text" placeholder="Nama" name="nama" value="<?php echo $i['user_nama']; ?>" class="form-control">
										</div>
									</div>
								</div>


								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Email: </label>
											<input type="email" placeholder="Email Address"  value="<?php echo $i['user_email']; ?>" name="email" class="form-control">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Jenis Kelamin: </label><br>
											<input type="checkbox" name="jk" class="switch" data-on-label="Male" data-off-label="Female" id="switch12" <?php if($i['user_jk']=='L'){echo "checked";} else {}?> />
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Telepon: </label>
											<input type="tel" name="tel" value="<?php echo $i['user_tel']; ?>" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Role: </label>
											<select name="role" class="form-control">
												<option value="admin" <?php if($i['user_role']=='admin'){echo "checked";} else {}?>>Admin</option>
												<option value="customer" <?php if($i['user_role']=='customer'){echo "checked";} else {}?>>Customer</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Alamat: </label>
											<textarea name="alamat" class="form-control"><?php echo $i['user_alamat']; ?></textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="close">
								<input type="submit" class="btn btn-outline-primary btn-lg" value="Submit">
							</div>
						</form>
					</div>
				</div>
			</div>


			<?php
		endforeach;
		foreach ($user as $i)  : 
			?>

			<div class="modal fade text-left" id="modalHapus<?php echo $i['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title" id="myModalLabel34">Konfirmasi</h3>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="<?php echo base_url()?>BackendC/delete_user" method="POST">
							<div class="modal-body bg-red">

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input type="hidden" name="user_id" value="<?php echo $i['user_id'];?>">
											<label class="text-center">Anda yakin ingin menghapus user <b><?php echo $i['user_username']; ?></b> ?</label>
										</div>
									</div>

								</div>
							</div>
							<div class="modal-footer">
								<input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="close">
								<input type="submit" class="btn btn-outline-primary btn-lg" value="Submit">
							</div>
						</form>
					</div>
				</div>
			</div>

		<?php endforeach; ?>
