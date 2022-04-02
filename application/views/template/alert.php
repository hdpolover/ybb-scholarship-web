<!-- ALERT -->
<?php if ($this->session->flashdata('error')) { ?>
    <script>
        Swal.fire({
            text: '<?php echo $this->session->flashdata('error'); ?>',
            icon: 'info',
        })
    </script>
<?php
} ?>

<?php if ($this->session->flashdata('warning')) { ?>
    <script>
        Swal.fire({
            text: '<?php echo $this->session->flashdata('warning'); ?>',
            icon: 'warning',
        })
    </script>
<?php
} ?>

<?php if ($this->session->flashdata('success')) { ?>
    <script>
        Swal.fire({
            text: '<?php echo $this->session->flashdata('success'); ?>',
            icon: 'success',
        })
    </script>
<?php
} ?>

<?php if ($this->session->flashdata('info')) { ?>
    <script>
        Swal.fire({
            text: '<?php echo $this->session->flashdata('info'); ?>',
            icon: 'info',
        })
    </script>
<?php
} ?>

<!-- TOAST -->
<?php if ($this->session->flashdata('notif_error')) { ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'error',
            title: "<?php echo $this->session->flashdata('notif_error'); ?>"
        })
    </script>
<?php
} ?>

<?php if ($this->session->flashdata('notif_warning')) { ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'warning',
            title: "<?php echo $this->session->flashdata('notif_warning'); ?>"
        })
    </script>
<?php
} ?>

<?php if ($this->session->flashdata('notif_success')) { ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: "<?php echo $this->session->flashdata('notif_success'); ?>"
        })
    </script>
<?php
} ?>

<?php if ($this->session->flashdata('notif_info')) { ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 6000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'info',
            title: "<?php echo $this->session->flashdata('notif_info'); ?>"
        })
    </script>
<?php
} ?>