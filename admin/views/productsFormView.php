<?php 
    //load file Layout.php vao day
    $layout = "Layout.php";
 ?>
 <div class="col-md-12">  
    <div class="panel panel-primary"  style="border: 1px solid #337ab7; border-radius: 3px; margin: 10px;">
        <div class="panel-heading"style="color: #fff; background-color: #337ab7; border-color: #337ab7; padding: 10px 15px; border-bottom: 1px solid transparent; border-top-left-radius: 3px; border-top-right-radius: 3px;">Add edit news</div>
        <div class="panel-body">
        <!-- muon upload duoc file thi trong the form phai co thuoc tinh enctype="multipart/form-data" -->
        <form method="post" enctype="multipart/form-data" action="<?php echo $action; ?>">
            <!-- rows -->
            <div class="row" style="margin: 15px;">
                <div class="col-md-2">Name</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($record->name)?$record->name:''; ?>" name="name" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin:15px;">
                <div class="col-md-2">Discount</div>
                <div class="col-md-10">
                    <input type="number" value="<?php echo isset($record->discount)?$record->discount:'0'; ?>" name="discount" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin: 15px;">
                <div class="col-md-2">Category</div>
                <div class="col-md-10">
                    <?php 
                        $conn = Connection::getInstance();
                        $query = $conn->query("select * from categories where parent_id = 0 order by id desc");
                        $categories = $query->fetchAll(PDO::FETCH_OBJ);
                     ?>
                    <select name="category_id" class="form-control" style="width: 300px;">
                        <?php foreach($categories as $rows): ?>
                        <option <?php if(isset($record->category_id) && $record->category_id == $rows->id): ?> selected <?php endif; ?> value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                            <?php 
                                $querySub = $conn->query("select * from categories where parent_id = {$rows->id} order by id desc");
                                $categoriesSub = $querySub->fetchAll(PDO::FETCH_OBJ);
                             ?>
                            <?php foreach($categoriesSub as $rowsSub): ?>
                            <option <?php if(isset($record->category_id) && $record->category_id == $rowsSub->id): ?> selected <?php endif; ?> value="<?php echo $rowsSub->id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowsSub->name; ?></option>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin:15px;">
                <div class="col-md-2">Descripition</div>
                <div class="col-md-10">
                    <textarea name="description" id="description"><?php echo isset($record->description)?$record->description:""; ?></textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace("description");
                    </script>
                </div>
            </div>
            <!-- end rows -->         
            <!-- rows -->
            <div class="row" style="margin:15px;">
                <div class="col-md-2">Upload image</div>
                <div class="col-md-10">
                    <input type="file" name="photo">
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin:15px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input type="submit" value="Process" class="btn btn-primary">
                </div>
            </div>
            <!-- end rows -->
        </form>
        </div>
    </div>
</div>