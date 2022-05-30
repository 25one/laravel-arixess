<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="table">
                <div class="card-header">Items List</div>

                    <div class="card-body">
                          <table class="table-wrapper" width="100%">
                             <thead>
                              <tr>
                                <td>Subject</td>                            
                                <td>Message</td>
                                <td>Name</td>   
                                <td>E-Mail</td>  
                                <td>Date of Creating</td> 
                                <td>Addition File</td> 
                                <td>Answered</td>                                                  
                              </tr>  
                              </thead>
                              <tbody id="pannel">
                                 <?php echo $__env->make('brick-standard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                             </tbody>    
                           </table>
                    </div>
                    <hr> 
                    <div id="pagination" class="box-footer">
                       <?php echo e($links); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel-arixess/resources/views/manager.blade.php ENDPATH**/ ?>