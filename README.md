# AP-repository-design-pattern
<h1> Base.VN </h1>
<h2> Repository Design Pattern for AP Framework </h2>
<br>
<h3 style="color: #ff0000;"> Usages </h3>
<ul>
  <li> Create folder <b> dev/repositories </b> </li>
  <li> Copy both <b> BlankRepository.php </b> and <b> BlankContract.php </b> into that folder </li>
  <li> Register <b> dev/repositories </b> into <b> app.ini </b> </li>
  <li> Foreach model, create its own repository class, extending BaseRepository and override function model() like below: <br>
    return \namespace_name\ModelName::class;
  </li>
</ul>
<br>
<h3 style="color: #ff0000;"> Deeper Insight </h3>
<ul>
  <li> Using function <b> call_user_func_array </b> to call <b> static function find() </b> of AP Framework to execute queries </li>
  <li> Using array manipulating functions to examine and deal with input data </li>
</ul>
