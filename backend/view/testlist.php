<div style="margin-top:70px;">
      <div>
        <table class="layui-table">
          <thead>
            <tr>
              <th>编号</th>
              <th>测试名</th>
              <th>用户名</th>
              <th>类型</th>
              <th>题目数量</th>
              <th>创建时间</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $i=1;
            foreach ($data as $user) {
              
              echo "
                  <tr>
                    <td>{$i}</td>
                    <td>{$user['test_name']}</td>
                    <td>{$user['username']}</td>";

                    //$testname = $user['test_name'];
                    
              // echo " <td>{$user['";
                //.$testname.
                //echo dataTypes['$testname'];
                //echo "']}</td>";

                foreach ($dataTypes as $type) {
                  $testname = $user['test_name'];
                  //echo $type['id'];
                  //echo $type['test_name'];
                  //echo $type['type'];

                  if($testname == $type['test_name'])
                  {
                    echo "<td>{$type['type']}</td>";
                    break;
                  }
                }
              
              echo "<td>{$user['count(test_name)']}</td>
                    <td>{$user['ctime']}</td>
                    <td>
                      <a class='layui-btn layui-btn-sm' href=\"./dotest.php?test_name={$user['test_name']}\">测试</a>
                      <button class=\"layui-btn layui-btn-sm layui-btn-danger\" >删除</button>
                    </td>
                  </tr>
              ";
              $i++;
            }
            ?>
          </tbody>
        </table>
      </div>
</div>