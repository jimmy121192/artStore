<div class="ui top attached tabular menu ">
    <a class="active item" data-tab="museum"><i class="university icon"></i>Museum</a> 
    <a class="item" data-tab="details"><i class="globe icon"></i>Location</a>
      
</div>
                
<div class="ui bottom attached active tab segment" data-tab="museum">
  <table class="ui definition very basic collapsing celled table">
    <tbody>
      <tr>
        <td>Gallery Name</td>
        <td><?php echo generateLink('single-artist.php?id=' . $row['GalleryID'], utf8_encode($row['GalleryName'])); ?></td>                       
      </tr>
      <tr>                       
        <td>Gallery Native Name</td>
        <td><?php echo  $row['GalleryNativeName']; ?></td>
      </tr>       
      <tr>
        <td>Gallery Website</td>
        <td><?php echo  $row['GalleryWebSite'];?>cm</td>
      </tr>        
    </tbody>
  </table>
</div>

<div class="ui bottom attached tab segment" data-tab="details">
    <table class="ui definition very basic collapsing celled table">
      <tbody>
        <tr>
          <td>City</td>
          <td>
            <?php echo $row['GalleryCity']; ?>
          </td>
        </tr>       
        <tr>
          <td>Country</td>
          <td>
            <?php echo  $row['GalleryCountry']; ?>
          </td>
        </tr>  
        <tr>
          <td>Latitude</td>
          <td>
            <?php echo  $row['Latitude']; ?>
          </td>
        </tr>       
        <tr>
          <td>Longtitude</td>
          <td>
            <?php $row['Longtitude']; ?>
          </td>
        </tr>        
      </tbody>
    </table>    
</div>   

</div>  