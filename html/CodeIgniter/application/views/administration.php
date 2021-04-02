<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 table-auto">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Username
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Role
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Action
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <?php foreach ($users as $user) : ?>
              <tr class="item_row">
                <td class="px-6 py-4 whitespace-nowrap"><?php echo $user['username']; ?></td>
                <td class="px-6 py-4 whitespace-nowrap"><?php echo $user['role']; ?></td>
                <td>
                  <?php if ($user['role'] === 'banned') { ?>
                    <a href="<?php echo base_url('user/user_unban/' . $user['id']); ?>" class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" style="height: 20px; border-radius:4px; margin-right: 15px">Unban</a>
                  <?php } else { ?>
                    <a href="<?php echo base_url('user/user_ban/' . $user['id']); ?>" class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" style="height: 20px; border-radius:4px; margin-right: 15px">Ban</a>
                  <?php } ?>
                  <?php if ($user['role'] === 'collector') { ?>
                    <a href="<?php echo base_url('user/user_grant_admin/' . $user['id']); ?>" class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" style="height: 20px; border-radius:4px; margin-right: 15px">Grant admin access</a>
                  <?php } else if ($user['role'] === 'admin') { ?>
                    <a href="<?php echo base_url('user/user_ungrant_admin/' . $user['id']); ?>" class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" style="height: 20px; border-radius:4px; margin-right: 15px">Ungrant admin access</a>
                  <?php } ?>
                  <a href="<?php echo base_url('user/user_delete/' . $user['id']); ?>" class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" style="height: 20px; border-radius:4px;">Delete user</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>