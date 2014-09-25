<!--Display Rating Form-->
<form action="<?php echo "catalog.php?id=".$id ?>" method="post">
    Choose Rating:<br />
    <select name="rating">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
    </select>
    
    <input type ="submit" name="submit" value="Rate!"/>
</form>