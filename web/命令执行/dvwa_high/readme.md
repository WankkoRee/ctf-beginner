# CTF Beginner

## Web

### 命令执行

#### DVWA 精通

> 题目来自：[digininja / DVWA - vulnerabilities/exec/source/high.php - c071268](https://github.com/digininja/DVWA/blob/c071268f7b4def6c5c50484db2c410952153ce9f/vulnerabilities/exec/source/high.php)
>
> 存在如下改动：
> - 修改对`| `的过滤为`|`，删除了对`||`的过滤，本难度没必要放水
> - 添加了对`\r`、`\n`的过滤，这个是原题未考虑到的手法
> - 删除了对`-`、`$`、`(`、`)`、`` ` ``的过滤，作为本难度考点

<img alt="为什么还能打通啊" height="200" src="./v2-202e466d3f3826ab428633c2ecfdf269_r.jpg" width="200"/>
