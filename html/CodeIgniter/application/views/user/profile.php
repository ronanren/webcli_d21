<?php
$user_id = $this->session->userdata('user_id');

if (!$user_id) {
	redirect('user/login_view');
}
?>

<div class="bg-white shadow overflow-hidden sm:rounded-lg">
	<div class="px-4 py-5 sm:px-6">
		<h3 class="text-lg leading-6 font-medium text-gray-900">
			Profile
		</h3>
		<p class="mt-1 max-w-2xl text-sm text-gray-500">
			Information about your profile.
		</p>
	</div>
	<div class="border-t border-gray-200">
		<dl>
			<div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
				<dt class="text-sm font-medium text-gray-500">
					Username
				</dt>
				<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
					<?php echo $this->session->userdata('user_name'); ?>
				</dd>
			</div>
			<div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
				<dt class="text-sm font-medium text-gray-500">
					Role
				</dt>
				<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
					<?php echo $this->session->userdata('user_role'); ?>
				</dd>
			</div>
		</dl>
	</div>
</div>