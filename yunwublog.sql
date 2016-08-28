/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50629
Source Host           : localhost:3306
Source Database       : yunwublog

Target Server Type    : MYSQL
Target Server Version : 50629
File Encoding         : 65001

Date: 2016-08-28 11:15:13
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `blog_article`
-- ----------------------------
DROP TABLE IF EXISTS `blog_article`;
CREATE TABLE `blog_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `channel_id` varchar(100) NOT NULL,
  `classify_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `column_8` int(11) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `pic` varchar(200) DEFAULT NULL,
  `markdown` text NOT NULL,
  `content` text NOT NULL,
  `update_date` int(11) NOT NULL,
  `operator` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `i_pk_article` (`id`) USING BTREE,
  KEY `i_article$channel_id` (`channel_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_article
-- ----------------------------
INSERT INTO `blog_article` VALUES ('6', '6', '9', 'LINUX基础命令', null, 'Linux|命令', null, 'LINUX基础学习\r\n------------------------------------\r\n\r\n###开源软件\r\n    \r\n    1. 使用的自由:绝大数开源软件免费\r\n    2. 研究的自由:可获得软件源代码\r\n    3. 散布及改良的自由:可以自由传播. 改良甚至销售\r\n\r\n###LINUX应用领域\r\n    \r\n    1. 企业服务器(www.netcraft.com)\r\n    2. 嵌入式应用\r\n\r\n###LINUX与WIN的不同\r\n\r\n    1. LINUX严格区分大小写\r\n    2. LINUX一切内容皆文件(包括硬件)\r\n    3. LINUX不靠扩展名区分文件类型\r\n    \r\n###LINUX常用命令\r\n\r\n####命令基本格式\r\n    \r\n    命令 [选项] [参数]\r\n    -a 等于 --all\r\n\r\n####基本命令\r\n\r\n    1. ls [选项] [文件或目录]\r\n        选项:\r\n            -a 显示所有文件, 包括隐藏文件 \r\n            -l 显示详细信息\r\n            -d 查看目录属性\r\n            -h 人性化显示文件大小\r\n            -i 显示iNode(文件ID号)\r\n        [root@Dream ~]# ls\r\n        -rw-------. 1 root root  1289 3月  12 19:46 anaconda-ks.cfg\r\n        第一位为文件的格式: -普通文件  d目录  l软链接文件\r\n        rw- u所有者  r-- g所属组  r-- o其他人\r\n        r读  w写  x执行\r\n        1代表使用次数\r\n\r\n    2. 建立目录(make directories)\r\n        mkdir -p [目录名]  -p 递归创建   eg. mkdir -p test1/test2\r\n\r\n    3. 切换所在目录 change directory\r\n        cd [目录]\r\n        简化操作\r\n            (1) cd ~ 进入当前用户的家目录\r\n            (2) cd   进入当前用户的家目录\r\n            (3) cd - 进入上次目录\r\n            (4) cd .. 进入上一级目录\r\n            (5) cd . 进入当前目录\r\n\r\n    4. 查询当前所在目录 print working directory\r\n        pwd \r\n\r\n    5. 删除空目录 remove empty directories\r\n        rmdir [目录名]\r\n\r\n    6. 删除文件或目录 (使用时一定要注意)\r\n        rm -rf [文件或者目录]\r\n        选项:\r\n            -r 删除目录\r\n            -f 强制\r\n        删除某文件夹下所有文件 rm -rf /tmp/*\r\n\r\n    7. 复制命令 copy\r\n        cp [选项]\r\n        选项:\r\n            -r 复制目录\r\n            -p 连带文件属性赋值\r\n            -d 若源文件是链接文件, 则复制链接属性\r\n            -a 相当于 -pdr\r\n\r\n    8. 剪切或者改名命令 move\r\n        mv [原文件目录] [目标目录]\r\n        注意:\r\n            原文件和目标文件在同一目录, 改名\r\n            原文件和目标文件不在同一目录, 剪切\r\n    \r\n    9. 链接命令 link\r\n        ln -s [原文件] [目标文件]  \r\n        选项:\r\n            -s 创建软链接\r\n        创建软链接时原文件必须写绝对地址\r\n        touch test1                         //创建文件\r\n        ln -s /root/test1 /tmp/test1.soft   //软链接\r\n        ln /root/test1 /tmp/test1.hard      //硬链接\r\n        (1)硬链接特征\r\n            a. 拥有相同的iNode节点和存储block块, 可以看做是同一个文件\r\n            b. 可通过iNode节点区分\r\n            c. 不能跨分区\r\n            d. 不能针对目录使用\r\n            e. 创建时原文件可写相对地址\r\n        (2)软链接特征\r\n            a. 类似win的快捷键\r\n            b. 软链接拥有自己的iNode节点和Block块, 其数据块中只保存原文件的文件名和iNode节点号, 并没有实际的文件数据\r\n            c. lrwxrwxrwx. 1 root root   11 3月  12 23:55 test1.soft -&gt; /root/test1    \r\n                第一个l代表这个文件是软链接, 软链接的权限不代表原文件的权限\r\n            d. 修改任意文件, 另一个都改变\r\n            e. 删除原文件, 软链接失效\r\n\r\n    10. locate文件搜索\r\n        locate文件名\r\n        locate命令搜索 /var/lib/mlocate 所在的后台数据库\r\n        updatedb 更新数据库\r\n        刚创建的文件无法搜索, 正常需要一天更新, 强制更新用 updatedb\r\n\r\n    11. whereis搜索命令的命令\r\n        搜索命令所在的路径及帮助文档所在位置\r\n        选项:\r\n            -b 只查找可执行文件\r\n            -m 只查找帮助文件\r\n        [root@Dream ~]# whereis ls\r\n        ls: /bin/ls /usr/share/man/man1p/ls.1p.gz /usr/share/man/man1/ls.1.gz\r\n\r\n    12. which搜索命令的命令\r\n        搜索命令所在路径及别名\r\n\r\n    13. $PATH环境变量(定义系统搜索命令的路径)\r\n        echo $PATH          #用 : 分割, 类似win的环境变量\r\n        /usr/lib64/qt-3.3/bin:/usr/local/sbin:\r\n        /usr/local/bin:/sbin:/bin:/usr/sbin:/usr/bin:/root/bin\r\n\r\n    14. find 文件搜索\r\n        find [搜索范围] [搜索条件]\r\n        find / -name install.log\r\n        find / -iname install.log  #不区分大小写\r\n        find / -user root  #查找所有者的文件\r\n        find / -nouser  #查找没有所有者的文件(垃圾文件. 系统文件. 外来文件)\r\n        find / -mtime  修改文件内容\r\n            find / -mtime +10  #10天前修改的文件\r\n            find / -mtime -10  #10天内修改的文件\r\n            find / -mtime 10   #10天当天修改的文件\r\n        find / -atime  #文件访问时间\r\n        find / -ctime  #改变文件属性\r\n        find / -size 25k #大小为25k\r\n                     -25k #小于25k\r\n                     +25k #大于25k\r\n        find / -inum 262422 #查找iNode节点是262422的文件\r\n        find / -size +20k -a -size -50k #查找大于20K小于50K的文件\r\n            -a and 逻辑与 两个条件都满足\r\n            -o or 逻辑或 两个条件满足一个即可\r\n        find / -size +20k -a -size -50k -exec ls -lh {} \\;\r\n            #查找大于20k小于50k的文件, 并显示详细信息\r\n            #exec/-ok 命令 {} \\; 对搜索结果执行命令操作\r\n        #避免大方为搜索, 会非常消耗系统资源\r\n        #find是在系统中搜索符合条件的文件名。\r\n        #如果需要匹配, 使用通配符匹配, 通配符是完全匹配\r\n        eg. find / -name install.log  #仅仅搜索出与文件名一致的文件\r\n            find / -name &quot;install.log*&quot;\r\n            fing / -name &quot;ab[cd]&quot; #搜索文件名为 abc 或者 abd 的文件\r\n            fing / -name &quot;*[cd]&quot; #搜索以 c 或者 d 结尾的文件  \r\n\r\n    15. 搜索字符串命令 grep\r\n        #在文件当中匹配符合条件的字符串\r\n        #如果需要匹配, 使用正则表达式匹配\r\n        选项:\r\n            -i 忽略大小写\r\n            -v 排除指定字符串\r\n        eg. grep -i &quot;Centos&quot; install.log\r\n\r\n    16. LINUX中的通配符\r\n        *   匹配任意内容\r\n        ?   匹配任意一个字符\r\n        []  匹配任意一个中括号内的字符\r\n\r\n    17. 帮助命令man  #获取指定命令的帮助\r\n        选项:\r\n            -f 命令级别\r\n        man -f 命令 相当于 whatis \r\n        man -k 命令 相当于 apropos 命令 #查看和命令相关的所有帮助\r\n            eg. man -k passwd   apropos passwd\r\n\r\n    18. zip格式压缩命令\r\n        zip 压缩文件名 源文件 #注意压缩文件名最好加上文件后缀 .zip\r\n        zip -r 压缩文件名 源目录\r\n        解压缩 unzip 压缩文件名\r\n\r\n    19. gz格式压缩\r\n        gzip 源文件    #压缩为.gz格式的压缩文件, 源文件会消失\r\n        gzip -c 源文件 &gt; 压缩文件  #压缩为.gz格式, 源文件保留\r\n            eq. gzip -c test &gt; test.gz\r\n        gzip -r 目录  #压缩目录下所有的子文件, 但是不能压缩目录\r\n        gzip -d 压缩文件名   #解压缩文件\r\n        gunzip 压缩文件名    #解压缩文件\r\n\r\n    20. bz2格式压缩     #不能压缩目录\r\n        bzip2 原文件名    #压缩为.bz2格式, 不保留源文件\r\n        bzip2 -k 源文件名   #压缩之后保留源文件\r\n        bzip2 -d 压缩文件名  #解压缩, -k 保留压缩文件\r\n        bunzip2 压缩文件名   #解压缩, -k 保留压缩文件\r\n    \r\n    21. 打包命令 tar\r\n        tar -cvf 打包文件名 源文件\r\n        选项: \r\n            -c 打包\r\n            -x 解打包\r\n            -v 显示过程\r\n            -t 查看压缩包内容\r\n            -f 指定打包后的文件名\r\n            -z 压缩为 .tar.gz 格式\r\n            -j 压缩为 .tar.bz2 格式\r\n        eg. tar -cvf test.tar test\r\n            tar -xvf test.tar\r\n            tar -zcvf test.tar.gz test\r\n            tar -jcvf test.tar.bz2 test\r\n            tar -jxvf test.tar.bz2 -C /tmp/     #解压到指定目录\r\n            tar -zcvf /tmp/test.tar.gz test install.log  #压缩多个文件到tmp目录\r\n            tar -ztcf test.tar.gz\r\n\r\n    22. 关机和重启命令\r\n        shutdown [选项] 时间\r\n        选项: \r\n            -c 取消前一个关机命令\r\n            -h 关机\r\n            -r 重启\r\n        eg. shutdown -r 05:30   #在凌晨五点半关机, 此期间不允许操作\r\n            shutdown -r 05:30 &amp; #加 &amp; 代表后台服务\r\n            shutdown -r now     #立即关机\r\n        halt #关机\r\n        poweroff #关机     \r\n        init 0   #关机\r\n        reboot   #重启\r\n        init 6   #重启\r\n        init 0 关机 1 单用户 2 不完全多用户, 不含NFS服务 \r\n             3 完全多用户 4 未分配 5 图形界面 6 重启\r\n        runlevel 查看当前系统运行的级别\r\n\r\n    23. logout退出命令  #xShell工具 ctrl+d 重启\r\n\r\n    24. 挂载命令\r\n        mount       #查询系统中已经挂载的设备\r\n        mount -a    #依据配置文件 /etc/fstab 的内容, 自动挂载\r\n        mount [-t 文件系统]  [-o 特殊选项] 设备文件名 挂载点\r\n        选项: \r\n            -t 文件系统: 加入文件系统类型来指定挂载的类型, 可以ext3/4 iso9660\r\n            -o 特殊选项: 可以指定挂载的额外选项\r\n        挂载光盘\r\n            mkdir /mnt/cdrom/   #建立挂载点\r\n            mount -t iso9660 /dev/sr0 /mnt/cdrom/     #挂载光盘\r\n        &lt;=&gt; mount /dev/sr0 /mnt/cdrom/ \r\n            ll /dev/cdrom  #查看光盘\r\n        卸载命令\r\n            umount 设备文件名或者挂载点\r\n            umount /mnt/cdrom 或者 umount /dev/sr0    #设备必须卸载\r\n        挂载U盘\r\n            fdisk -l    #查看U盘文件设备名\r\n            mount -t vfat /dev/sdb1 /mnt/usb/\r\n            #LINUX默认不支持NTFS文件系统\r\n\r\n    25. 查看硬盘 fdisk -l    \r\n\r\n    26. 查看登录用户信息\r\n        w 用户名\r\n        命令输出: \r\n            USER: 登录的用户名\r\n            TTY: 登录终端       #TTY1本机登录, pts/0 远程登录\r\n            FROM: 登录IP地址\r\n            LOGIN@: 登录时间\r\n            IDLE: 用户闲置时间\r\n            JCPU: 系统耗费西园\r\n            PCPU: 当前进程所占用的时间\r\n            WHAT: 当前正在运行的命令\r\n\r\n    27. 查看用户登录信息\r\n        who 用户名\r\n        命令输出: \r\n            用户名\r\n            登录中端\r\n            登录时间(登录IP地址)\r\n\r\n    28. 查询当前登录和过去登录用户的信息\r\n        last\r\n        last命令默认读取 /var/log/wtmp 文件数据\r\n        命令输出\r\n            - 用户名\r\n            - 登录终端\r\n            - 登录IP\r\n            - 登录时间\r\n            - 退出时间(在线时间)\r\n\r\n    29. 查看所有用户的最后一次登录时间\r\n        lastlog\r\n        lastlog命令默认是读取 /var/log/lastlog 文件内容\r\n        命令输出: \r\n            - 用户名\r\n            - 登录终端\r\n            - 登录IP\r\n            - 最后一次登录时间\r\n\r\n###SHELL基础\r\n\r\n####常用命令\r\n    \r\n    1. echo\r\n\r\n![挂载选项](http://img.mukewang.com/56f3a07000011ab112800720.jpg)', '&lt;h2 id=&quot;h2-linux-&quot;&gt;&lt;a name=&quot;LINUX基础学习&quot; class=&quot;reference-link&quot;&gt;&lt;/a&gt;&lt;span class=&quot;header-link octicon octicon-link&quot;&gt;&lt;/span&gt;LINUX基础学习&lt;/h2&gt;&lt;h3 id=&quot;h3-u5F00u6E90u8F6Fu4EF6&quot;&gt;&lt;a name=&quot;开源软件&quot; class=&quot;reference-link&quot;&gt;&lt;/a&gt;&lt;span class=&quot;header-link octicon octicon-link&quot;&gt;&lt;/span&gt;开源软件&lt;/h3&gt;&lt;pre&gt;&lt;code&gt;1. 使用的自由:绝大数开源软件免费\r\n2. 研究的自由:可获得软件源代码\r\n3. 散布及改良的自由:可以自由传播. 改良甚至销售\r\n&lt;/code&gt;&lt;/pre&gt;&lt;h3 id=&quot;h3-linux-&quot;&gt;&lt;a name=&quot;LINUX应用领域&quot; class=&quot;reference-link&quot;&gt;&lt;/a&gt;&lt;span class=&quot;header-link octicon octicon-link&quot;&gt;&lt;/span&gt;LINUX应用领域&lt;/h3&gt;&lt;pre&gt;&lt;code&gt;1. 企业服务器(www.netcraft.com)\r\n2. 嵌入式应用\r\n&lt;/code&gt;&lt;/pre&gt;&lt;h3 id=&quot;h3-linux-win-&quot;&gt;&lt;a name=&quot;LINUX与WIN的不同&quot; class=&quot;reference-link&quot;&gt;&lt;/a&gt;&lt;span class=&quot;header-link octicon octicon-link&quot;&gt;&lt;/span&gt;LINUX与WIN的不同&lt;/h3&gt;&lt;pre&gt;&lt;code&gt;1. LINUX严格区分大小写\r\n2. LINUX一切内容皆文件(包括硬件)\r\n3. LINUX不靠扩展名区分文件类型\r\n&lt;/code&gt;&lt;/pre&gt;&lt;h3 id=&quot;h3-linux-&quot;&gt;&lt;a name=&quot;LINUX常用命令&quot; class=&quot;reference-link&quot;&gt;&lt;/a&gt;&lt;span class=&quot;header-link octicon octicon-link&quot;&gt;&lt;/span&gt;LINUX常用命令&lt;/h3&gt;&lt;h4 id=&quot;h4-u547Du4EE4u57FAu672Cu683Cu5F0F&quot;&gt;&lt;a name=&quot;命令基本格式&quot; class=&quot;reference-link&quot;&gt;&lt;/a&gt;&lt;span class=&quot;header-link octicon octicon-link&quot;&gt;&lt;/span&gt;命令基本格式&lt;/h4&gt;&lt;pre&gt;&lt;code&gt;命令 [选项] [参数]\r\n-a 等于 --all\r\n&lt;/code&gt;&lt;/pre&gt;&lt;h4 id=&quot;h4-u57FAu672Cu547Du4EE4&quot;&gt;&lt;a name=&quot;基本命令&quot; class=&quot;reference-link&quot;&gt;&lt;/a&gt;&lt;span class=&quot;header-link octicon octicon-link&quot;&gt;&lt;/span&gt;基本命令&lt;/h4&gt;&lt;pre&gt;&lt;code&gt;1. ls [选项] [文件或目录]\r\n    选项:\r\n        -a 显示所有文件, 包括隐藏文件 \r\n        -l 显示详细信息\r\n        -d 查看目录属性\r\n        -h 人性化显示文件大小\r\n        -i 显示iNode(文件ID号)\r\n    [root@Dream ~]# ls\r\n    -rw-------. 1 root root  1289 3月  12 19:46 anaconda-ks.cfg\r\n    第一位为文件的格式: -普通文件  d目录  l软链接文件\r\n    rw- u所有者  r-- g所属组  r-- o其他人\r\n    r读  w写  x执行\r\n    1代表使用次数\r\n\r\n2. 建立目录(make directories)\r\n    mkdir -p [目录名]  -p 递归创建   eg. mkdir -p test1/test2\r\n\r\n3. 切换所在目录 change directory\r\n    cd [目录]\r\n    简化操作\r\n        (1) cd ~ 进入当前用户的家目录\r\n        (2) cd   进入当前用户的家目录\r\n        (3) cd - 进入上次目录\r\n        (4) cd .. 进入上一级目录\r\n        (5) cd . 进入当前目录\r\n\r\n4. 查询当前所在目录 print working directory\r\n    pwd \r\n\r\n5. 删除空目录 remove empty directories\r\n    rmdir [目录名]\r\n\r\n6. 删除文件或目录 (使用时一定要注意)\r\n    rm -rf [文件或者目录]\r\n    选项:\r\n        -r 删除目录\r\n        -f 强制\r\n    删除某文件夹下所有文件 rm -rf /tmp/*\r\n\r\n7. 复制命令 copy\r\n    cp [选项]\r\n    选项:\r\n        -r 复制目录\r\n        -p 连带文件属性赋值\r\n        -d 若源文件是链接文件, 则复制链接属性\r\n        -a 相当于 -pdr\r\n\r\n8. 剪切或者改名命令 move\r\n    mv [原文件目录] [目标目录]\r\n    注意:\r\n        原文件和目标文件在同一目录, 改名\r\n        原文件和目标文件不在同一目录, 剪切\r\n\r\n9. 链接命令 link\r\n    ln -s [原文件] [目标文件]  \r\n    选项:\r\n        -s 创建软链接\r\n    创建软链接时原文件必须写绝对地址\r\n    touch test1                         //创建文件\r\n    ln -s /root/test1 /tmp/test1.soft   //软链接\r\n    ln /root/test1 /tmp/test1.hard      //硬链接\r\n    (1)硬链接特征\r\n        a. 拥有相同的iNode节点和存储block块, 可以看做是同一个文件\r\n        b. 可通过iNode节点区分\r\n        c. 不能跨分区\r\n        d. 不能针对目录使用\r\n        e. 创建时原文件可写相对地址\r\n    (2)软链接特征\r\n        a. 类似win的快捷键\r\n        b. 软链接拥有自己的iNode节点和Block块, 其数据块中只保存原文件的文件名和iNode节点号, 并没有实际的文件数据\r\n        c. lrwxrwxrwx. 1 root root   11 3月  12 23:55 test1.soft -&amp;gt; /root/test1    \r\n            第一个l代表这个文件是软链接, 软链接的权限不代表原文件的权限\r\n        d. 修改任意文件, 另一个都改变\r\n        e. 删除原文件, 软链接失效\r\n\r\n10. locate文件搜索\r\n    locate文件名\r\n    locate命令搜索 /var/lib/mlocate 所在的后台数据库\r\n    updatedb 更新数据库\r\n    刚创建的文件无法搜索, 正常需要一天更新, 强制更新用 updatedb\r\n\r\n11. whereis搜索命令的命令\r\n    搜索命令所在的路径及帮助文档所在位置\r\n    选项:\r\n        -b 只查找可执行文件\r\n        -m 只查找帮助文件\r\n    [root@Dream ~]# whereis ls\r\n    ls: /bin/ls /usr/share/man/man1p/ls.1p.gz /usr/share/man/man1/ls.1.gz\r\n\r\n12. which搜索命令的命令\r\n    搜索命令所在路径及别名\r\n\r\n13. $PATH环境变量(定义系统搜索命令的路径)\r\n    echo $PATH          #用 : 分割, 类似win的环境变量\r\n    /usr/lib64/qt-3.3/bin:/usr/local/sbin:\r\n    /usr/local/bin:/sbin:/bin:/usr/sbin:/usr/bin:/root/bin\r\n\r\n14. find 文件搜索\r\n    find [搜索范围] [搜索条件]\r\n    find / -name install.log\r\n    find / -iname install.log  #不区分大小写\r\n    find / -user root  #查找所有者的文件\r\n    find / -nouser  #查找没有所有者的文件(垃圾文件. 系统文件. 外来文件)\r\n    find / -mtime  修改文件内容\r\n        find / -mtime +10  #10天前修改的文件\r\n        find / -mtime -10  #10天内修改的文件\r\n        find / -mtime 10   #10天当天修改的文件\r\n    find / -atime  #文件访问时间\r\n    find / -ctime  #改变文件属性\r\n    find / -size 25k #大小为25k\r\n                 -25k #小于25k\r\n                 +25k #大于25k\r\n    find / -inum 262422 #查找iNode节点是262422的文件\r\n    find / -size +20k -a -size -50k #查找大于20K小于50K的文件\r\n        -a and 逻辑与 两个条件都满足\r\n        -o or 逻辑或 两个条件满足一个即可\r\n    find / -size +20k -a -size -50k -exec ls -lh {} \\;\r\n        #查找大于20k小于50k的文件, 并显示详细信息\r\n        #exec/-ok 命令 {} \\; 对搜索结果执行命令操作\r\n    #避免大方为搜索, 会非常消耗系统资源\r\n    #find是在系统中搜索符合条件的文件名。\r\n    #如果需要匹配, 使用通配符匹配, 通配符是完全匹配\r\n    eg. find / -name install.log  #仅仅搜索出与文件名一致的文件\r\n        find / -name &quot;install.log*&quot;\r\n        fing / -name &quot;ab[cd]&quot; #搜索文件名为 abc 或者 abd 的文件\r\n        fing / -name &quot;*[cd]&quot; #搜索以 c 或者 d 结尾的文件  \r\n\r\n15. 搜索字符串命令 grep\r\n    #在文件当中匹配符合条件的字符串\r\n    #如果需要匹配, 使用正则表达式匹配\r\n    选项:\r\n        -i 忽略大小写\r\n        -v 排除指定字符串\r\n    eg. grep -i &quot;Centos&quot; install.log\r\n\r\n16. LINUX中的通配符\r\n    *   匹配任意内容\r\n    ?   匹配任意一个字符\r\n    []  匹配任意一个中括号内的字符\r\n\r\n17. 帮助命令man  #获取指定命令的帮助\r\n    选项:\r\n        -f 命令级别\r\n    man -f 命令 相当于 whatis \r\n    man -k 命令 相当于 apropos 命令 #查看和命令相关的所有帮助\r\n        eg. man -k passwd   apropos passwd\r\n\r\n18. zip格式压缩命令\r\n    zip 压缩文件名 源文件 #注意压缩文件名最好加上文件后缀 .zip\r\n    zip -r 压缩文件名 源目录\r\n    解压缩 unzip 压缩文件名\r\n\r\n19. gz格式压缩\r\n    gzip 源文件    #压缩为.gz格式的压缩文件, 源文件会消失\r\n    gzip -c 源文件 &amp;gt; 压缩文件  #压缩为.gz格式, 源文件保留\r\n        eq. gzip -c test &amp;gt; test.gz\r\n    gzip -r 目录  #压缩目录下所有的子文件, 但是不能压缩目录\r\n    gzip -d 压缩文件名   #解压缩文件\r\n    gunzip 压缩文件名    #解压缩文件\r\n\r\n20. bz2格式压缩     #不能压缩目录\r\n    bzip2 原文件名    #压缩为.bz2格式, 不保留源文件\r\n    bzip2 -k 源文件名   #压缩之后保留源文件\r\n    bzip2 -d 压缩文件名  #解压缩, -k 保留压缩文件\r\n    bunzip2 压缩文件名   #解压缩, -k 保留压缩文件\r\n\r\n21. 打包命令 tar\r\n    tar -cvf 打包文件名 源文件\r\n    选项: \r\n        -c 打包\r\n        -x 解打包\r\n        -v 显示过程\r\n        -t 查看压缩包内容\r\n        -f 指定打包后的文件名\r\n        -z 压缩为 .tar.gz 格式\r\n        -j 压缩为 .tar.bz2 格式\r\n    eg. tar -cvf test.tar test\r\n        tar -xvf test.tar\r\n        tar -zcvf test.tar.gz test\r\n        tar -jcvf test.tar.bz2 test\r\n        tar -jxvf test.tar.bz2 -C /tmp/     #解压到指定目录\r\n        tar -zcvf /tmp/test.tar.gz test install.log  #压缩多个文件到tmp目录\r\n        tar -ztcf test.tar.gz\r\n\r\n22. 关机和重启命令\r\n    shutdown [选项] 时间\r\n    选项: \r\n        -c 取消前一个关机命令\r\n        -h 关机\r\n        -r 重启\r\n    eg. shutdown -r 05:30   #在凌晨五点半关机, 此期间不允许操作\r\n        shutdown -r 05:30 &amp;amp; #加 &amp;amp; 代表后台服务\r\n        shutdown -r now     #立即关机\r\n    halt #关机\r\n    poweroff #关机     \r\n    init 0   #关机\r\n    reboot   #重启\r\n    init 6   #重启\r\n    init 0 关机 1 单用户 2 不完全多用户, 不含NFS服务 \r\n         3 完全多用户 4 未分配 5 图形界面 6 重启\r\n    runlevel 查看当前系统运行的级别\r\n\r\n23. logout退出命令  #xShell工具 ctrl+d 重启\r\n\r\n24. 挂载命令\r\n    mount       #查询系统中已经挂载的设备\r\n    mount -a    #依据配置文件 /etc/fstab 的内容, 自动挂载\r\n    mount [-t 文件系统]  [-o 特殊选项] 设备文件名 挂载点\r\n    选项: \r\n        -t 文件系统: 加入文件系统类型来指定挂载的类型, 可以ext3/4 iso9660\r\n        -o 特殊选项: 可以指定挂载的额外选项\r\n    挂载光盘\r\n        mkdir /mnt/cdrom/   #建立挂载点\r\n        mount -t iso9660 /dev/sr0 /mnt/cdrom/     #挂载光盘\r\n    &amp;lt;=&amp;gt; mount /dev/sr0 /mnt/cdrom/ \r\n        ll /dev/cdrom  #查看光盘\r\n    卸载命令\r\n        umount 设备文件名或者挂载点\r\n        umount /mnt/cdrom 或者 umount /dev/sr0    #设备必须卸载\r\n    挂载U盘\r\n        fdisk -l    #查看U盘文件设备名\r\n        mount -t vfat /dev/sdb1 /mnt/usb/\r\n        #LINUX默认不支持NTFS文件系统\r\n\r\n25. 查看硬盘 fdisk -l    \r\n\r\n26. 查看登录用户信息\r\n    w 用户名\r\n    命令输出: \r\n        USER: 登录的用户名\r\n        TTY: 登录终端       #TTY1本机登录, pts/0 远程登录\r\n        FROM: 登录IP地址\r\n        LOGIN@: 登录时间\r\n        IDLE: 用户闲置时间\r\n        JCPU: 系统耗费西园\r\n        PCPU: 当前进程所占用的时间\r\n        WHAT: 当前正在运行的命令\r\n\r\n27. 查看用户登录信息\r\n    who 用户名\r\n    命令输出: \r\n        用户名\r\n        登录中端\r\n        登录时间(登录IP地址)\r\n\r\n28. 查询当前登录和过去登录用户的信息\r\n    last\r\n    last命令默认读取 /var/log/wtmp 文件数据\r\n    命令输出\r\n        - 用户名\r\n        - 登录终端\r\n        - 登录IP\r\n        - 登录时间\r\n        - 退出时间(在线时间)\r\n\r\n29. 查看所有用户的最后一次登录时间\r\n    lastlog\r\n    lastlog命令默认是读取 /var/log/lastlog 文件内容\r\n    命令输出: \r\n        - 用户名\r\n        - 登录终端\r\n        - 登录IP\r\n        - 最后一次登录时间\r\n&lt;/code&gt;&lt;/pre&gt;&lt;h3 id=&quot;h3-shell-&quot;&gt;&lt;a name=&quot;SHELL基础&quot; class=&quot;reference-link&quot;&gt;&lt;/a&gt;&lt;span class=&quot;header-link octicon octicon-link&quot;&gt;&lt;/span&gt;SHELL基础&lt;/h3&gt;&lt;h4 id=&quot;h4-u5E38u7528u547Du4EE4&quot;&gt;&lt;a name=&quot;常用命令&quot; class=&quot;reference-link&quot;&gt;&lt;/a&gt;&lt;span class=&quot;header-link octicon octicon-link&quot;&gt;&lt;/span&gt;常用命令&lt;/h4&gt;&lt;pre&gt;&lt;code&gt;1. echo\r\n&lt;/code&gt;&lt;/pre&gt;&lt;p&gt;&lt;img src=&quot;http://img.mukewang.com/56f3a07000011ab112800720.jpg&quot; alt=&quot;挂载选项&quot;&gt;', '1472227792', '1');

-- ----------------------------
-- Table structure for `blog_auth_group`
-- ----------------------------
DROP TABLE IF EXISTS `blog_auth_group`;
CREATE TABLE `blog_auth_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sort` int(11) NOT NULL DEFAULT '1',
  `title` char(20) NOT NULL DEFAULT '',
  `rules` varchar(20000) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `i_pk_auth_group` (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_auth_group
-- ----------------------------

-- ----------------------------
-- Table structure for `blog_auth_group_access`
-- ----------------------------
DROP TABLE IF EXISTS `blog_auth_group_access`;
CREATE TABLE `blog_auth_group_access` (
  `uid` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  UNIQUE KEY `i_pk_auth_group_access` (`uid`,`group_id`) USING BTREE,
  KEY `i_auth_group_access$uid` (`uid`) USING BTREE,
  KEY `i_auth_group_access$group_id` (`group_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_auth_group_access
-- ----------------------------

-- ----------------------------
-- Table structure for `blog_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `blog_auth_rule`;
CREATE TABLE `blog_auth_rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sort` int(11) NOT NULL DEFAULT '1',
  `menu_link` varchar(200) DEFAULT NULL,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(4) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `i_auth_rule$name` (`name`) USING BTREE,
  UNIQUE KEY `i_pk_auth_rule` (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=290 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_auth_rule
-- ----------------------------
INSERT INTO `blog_auth_rule` VALUES ('10', '10', '/Admin/Index/index', '/Admin/Index/index', '首页', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('20', '20', '/Admin/Menu/index', '/Admin/Menu/index', '菜单管理', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('30', '30', '/Admin/AuthRule/index', '/Admin/AuthRule/index', '功能管理', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('31', '31', '/Admin/AuthRule/index', '/Admin/AuthRule/handle', '功能处理（添加/修改）', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('32', '32', '/Admin/AuthRule/index', '/Admin/AuthRule/del', '功能删除', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('40', '40', '/Admin/AuthGroup/index', '/Admin/AuthGroup/index', '功能分组', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('41', '41', '/Admin/AuthGroup/index', '/Admin/AuthGroup/handle', '功能分组处理（添加/修改）', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('42', '42', '/Admin/AuthGroup/index', '/Admin/AuthGroup/del', '功能分组删除', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('45', '45', '/Admin/Manage/index', '/Admin/Manage/index', '会员管理', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('46', '46', '/Admin/Manage/index', '/Admin/Manage/handle', '会员管理（添加修改）', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('47', '47', '/Admin/Manage/index', '/Admin/CountyManage/del', '会员管理（删除）', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('201', '201', '/Admin/User/index', '/Admin/User/index', '信息管理', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('202', '202', '/Admin/User/index', '/Admin/User/handle', '信息修改', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('250', '250', '/Admin/Config/index', '/Admin/Config/index', '网站配置', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('251', '251', '/Admin/Config/index', '/Admin/Config/handle', '网站配置修改', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('260', '260', '/Admin/Banner/index', '/Admin/Banner/index', '首页滚动图', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('261', '261', '/Admin/Banner/index', '/Admin/Banner/handle', '网站首页图修改、添加', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('262', '262', '/Admin/Banner/index', '/Admin/Banner/del', '网站首页图删除', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('263', '263', '/Admin/Banner/index', '/Admin/Banner/uploadPic', '网站首页图上传', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('270', '270', '/Admin/Channel/index', '/Admin/Channel/index', '栏目管理', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('271', '271', '/Admin/Channel/index', '/Admin/Channel/handle', '栏目修改、添加', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('272', '272', '/Admin/Channel/index', '/Admin/Channel/del', '栏目删除', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('277', '277', null, '/Admin/Article/index', '文章列表', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('278', '278', null, '/Admin/Article/del', '文章删除', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('279', '279', null, '/Admin/Article/page', '文章发布、修改', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('280', '280', null, '/Admin/Article/uploadPic', '文章图片上传', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('281', '281', null, '/Admin/Article/handle', '文章提交', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('285', '21', '/Admin/Menu/index', '/Admin/Menu/handle', '菜单处理（添加/修改）', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('286', '22', '/Admin/Menu/index', '/Admin/Menu/del', '菜单删除', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('287', '273', '/Admin/Channel/index', '/Admin/Classify/index', '栏目分类目录', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('288', '274', '/Admin/Channel/index', '/Admin/Classify/handle', '栏目分类目录处理', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('289', '275', '/Admin/Channel/index', '/Admin/Classify/del', '栏目分类目录删除', '1', '1', '');

-- ----------------------------
-- Table structure for `blog_banner`
-- ----------------------------
DROP TABLE IF EXISTS `blog_banner`;
CREATE TABLE `blog_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pic` varchar(200) NOT NULL,
  `alink` varchar(200) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `i_pk_banner` (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_banner
-- ----------------------------

-- ----------------------------
-- Table structure for `blog_channel`
-- ----------------------------
DROP TABLE IF EXISTS `blog_channel`;
CREATE TABLE `blog_channel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `i_pk_channel` (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_channel
-- ----------------------------
INSERT INTO `blog_channel` VALUES ('1', '前端开发', '1');
INSERT INTO `blog_channel` VALUES ('2', '后端开发', '2');
INSERT INTO `blog_channel` VALUES ('3', '移动开发', '3');
INSERT INTO `blog_channel` VALUES ('4', '数据库', '4');
INSERT INTO `blog_channel` VALUES ('5', '数据结构', '5');
INSERT INTO `blog_channel` VALUES ('6', '操作系统', '6');
INSERT INTO `blog_channel` VALUES ('7', '运维&amp;测试', '7');
INSERT INTO `blog_channel` VALUES ('8', '云计算&amp;大数据', '8');

-- ----------------------------
-- Table structure for `blog_classify`
-- ----------------------------
DROP TABLE IF EXISTS `blog_classify`;
CREATE TABLE `blog_classify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `channel_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blog_classify_id_uindex` (`id`),
  KEY `i_classify&channel_id` (`channel_id`),
  KEY `i_classify&name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_classify
-- ----------------------------
INSERT INTO `blog_classify` VALUES ('4', '1', 'JavaScript', '3');
INSERT INTO `blog_classify` VALUES ('5', '2', 'PHP', '1');
INSERT INTO `blog_classify` VALUES ('6', '2', 'Java', '2');
INSERT INTO `blog_classify` VALUES ('7', '1', 'HTML', '1');
INSERT INTO `blog_classify` VALUES ('8', '1', 'CSS', '2');
INSERT INTO `blog_classify` VALUES ('9', '6', 'Linux-Centos', '1');
INSERT INTO `blog_classify` VALUES ('10', '6', 'Winodws', '2');

-- ----------------------------
-- Table structure for `blog_manage`
-- ----------------------------
DROP TABLE IF EXISTS `blog_manage`;
CREATE TABLE `blog_manage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `manage_name` varchar(200) NOT NULL,
  `manage_phone` varchar(20) NOT NULL,
  `manage_weixin` varchar(50) NOT NULL,
  `img` varchar(20) NOT NULL DEFAULT 'default-user.jpg',
  `pwd` varchar(32) NOT NULL,
  `remark` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `i_pk_county_manage` (`id`) USING BTREE,
  KEY `i_county_manage$name` (`name`) USING BTREE,
  KEY `i_county_manage$manage_name` (`manage_name`) USING BTREE,
  KEY `i_county_manage$pwd` (`pwd`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_manage
-- ----------------------------
INSERT INTO `blog_manage` VALUES ('1', 'admin', '超级管理员', '13088730495', 'bcv1741', 'default-male.jpg', 'aac5771af3d4e79f72c12c31caabd9a5', '');

-- ----------------------------
-- Table structure for `blog_menu`
-- ----------------------------
DROP TABLE IF EXISTS `blog_menu`;
CREATE TABLE `blog_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` tinyint(4) NOT NULL,
  `pid` varchar(200) NOT NULL,
  `icon` varchar(20) NOT NULL,
  `name` char(20) NOT NULL,
  `alink` char(100) NOT NULL,
  `sort` int(11) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `i_pk_menu` (`id`) USING BTREE,
  KEY `i_menu$level` (`level`) USING BTREE,
  KEY `i_menu$pid` (`pid`) USING BTREE,
  KEY `i_menu$status` (`status`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_menu
-- ----------------------------
INSERT INTO `blog_menu` VALUES ('1', '0', '0', 'magic', '首页', '/Admin/Index/index', '1', '1');
INSERT INTO `blog_menu` VALUES ('2', '0', '0', 'clipboard', '菜单管理', '/Admin/Menu/index', '2', '1');
INSERT INTO `blog_menu` VALUES ('3', '0', '0', 'list-ul', '功能管理', '/Admin/AuthRule/index', '3', '1');
INSERT INTO `blog_menu` VALUES ('4', '0', '0', 'th-large', '功能分组', '/Admin/AuthGroup/index', '4', '1');
INSERT INTO `blog_menu` VALUES ('5', '0', '0', 'gears', '会员管理', '/Admin/Manage/index', '5', '1');
INSERT INTO `blog_menu` VALUES ('27', '0', '0', 'pencil-square-o', '编辑信息', '/Admin/User/index', '27', '1');
INSERT INTO `blog_menu` VALUES ('29', '0', '0', 'gears', '网站配置', '/Admin/Config/index', '29', '1');
INSERT INTO `blog_menu` VALUES ('30', '0', '0', 'picture-o', '首页滚动图', '/Admin/Banner/index', '30', '1');
INSERT INTO `blog_menu` VALUES ('31', '0', '0', 'list', '栏目管理', '/Admin/Channel/index', '31', '1');
