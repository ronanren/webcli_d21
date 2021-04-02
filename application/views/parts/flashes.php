<?php
$success_msg = $this->session->flashdata('success_msg');
$error_msg = $this->session->flashdata('error_msg');

if ($success_msg) {
?>
    <div class="text-center py-4 lg:px-4">
        <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
            <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">Success</span>
            <span class="font-semibold mr-2 text-left flex-auto"><?php echo $success_msg; ?></span>
        </div>
    </div>

<?php
}
if ($error_msg) {
?>
    <div class="text-center py-4 lg:px-4">
        <div class="p-2 bg-red-800 items-center text-red-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
            <span class="flex rounded-full bg-red-500 uppercase px-2 py-1 text-xs font-bold mr-3">Error</span>
            <span class="font-semibold mr-2 text-left flex-auto"><?php echo $error_msg; ?></span>
        </div>
    </div>
<?php
}
