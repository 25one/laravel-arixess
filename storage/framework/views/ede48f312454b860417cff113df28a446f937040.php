<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td><?php echo e($item->subject); ?></td>
<td><?php echo e($item->message); ?></td>  
<td><?php echo e($item->name); ?></td>
<td><?php echo e($item->email); ?></td>
<td><?php echo e($item->created_at); ?></td>
<td><?php if($item->file): ?><a href="<?php echo e(asset($item->file)); ?>" download>Download</a><?php endif; ?></td>
<td>
<?php if(! $item->answered): ?>
    <form method="POST" action="<?php echo e(route('answered-item')); ?>">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="id" value="<?php echo e($item->id); ?>">

        <button type="submit" class="btn btn-primary">
            <?php echo e(__('Check as Answered')); ?>

        </button>        
    </form> 
<?php else: ?>
   <?php echo e(__('Answered')); ?>       
<?php endif; ?>
</td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /var/www/html/laravel-arixess/resources/views/brick-standard.blade.php ENDPATH**/ ?>