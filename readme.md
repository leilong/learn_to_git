# 目标：单个文件实现文件的版本管理

## 1, 仓库创建 - init（完成）

## 2, 本地仓库的添加文件 - add（完成）
（指定文件名）
（只对应文件，没有文件名，目录下显示所有文件）
（但是必须支持文件夹！）

##  3, 提交到本地仓库 - commit
（保存文件快照，添加记录到log，索引向导）

## 4, 查看提交日志 - log
（查看）

## 5, 回退版本 - reset -v HEAD asbchjabshcba
（将某个文件的版本快照覆盖到新目录）

## 6, 文件比对 - diff a.txt b.txt

## 7, 分支创建，分支合并，分支删除 - branch 
-c dev 
-m dev
-d dev

------------


# 目录结构
```
.history
	20190109
		HEAD
			dev
				6f136c7aa1a574388a0facf35ba27e57.php
			master
		stage
	HEAD_log.txt
	stage_log.txt
common.php 命令行执行文件
	
	
```
------------
# 运行方式（三步）
## 1，将 `common.php `复制到项目根目录下
## 2，命令行到根目录下运行 `php-cgi -f common.php`
## 3，输入命令，如init，即可创建

# 命令列表
```
init	生成版本管理仓库
add	添加文件到暂存区
commit	添加文件到版本库
log	查看提交日志
reset	回退版本
diff	文件对比
branch	分支操作
```

# Issues
## 1，增加账号的支持
## 2，增加本地协议提交，跨库提交




