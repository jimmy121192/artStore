<div class="ui top attached tabular menu ">
    <a class="active item" data-tab="details"><i class="image icon"></i>Details</a>  
    
</div>
                
<div class="ui bottom attached active tab segment" data-tab="details">
  <table class="ui definition very basic collapsing celled table">
    <tbody>
      <tr>
        <td>Artist</td>
        <td><?php echo generateLink('single-artist.php?id=' . $row['ArtistID'], utf8_encode($row['FirstName'] . ' ' . $row['LastName'])); ?></td>                       
      </tr>
      <tr>                       
        <td>Gender</td>
        <td><?php echo  $row['Gender']; ?></td>
      </tr>
      <tr>                       
        <td>Nationality</td>
        <td><?php echo  $row['Nationality']; ?></td>
      </tr>   
      <tr>                       
        <td>Year of Birth</td>
        <td><?php echo  $row['YearOfBirth']; ?></td>
      </tr> 
      <tr>                       
        <td>Year of Death</td>
        <td><?php echo  $row['YearOfDeath']; ?></td>
      </tr>         
      <tr>
        <td>Link</td>
        <td><?php echo  $row['ArtistLink']; ?></td>
      </tr>          
    </tbody>
  </table>
</div>

