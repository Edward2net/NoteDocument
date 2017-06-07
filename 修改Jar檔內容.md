# 修改Jar檔內容

---

1.解壓Jar檔
> 將Jar檔案直接使用7-ZIP解壓縮成一個資料夾

2.取得原始檔
> 使用反組譯程式 [JD-GUI](http://en.wikipedia.org/wiki/Java_Decompiler) 將要修改的Class另存為副檔名 .java 的文字檔案並修改。

3.編譯原始檔
> 使用 ***JDK*** 內的 ***javac*** 將 .java 組譯回 .class

> 語法:  javac xxx.java 

> ("xxx為組譯檔名" 這樣就完成組譯)

4.封裝回Jar檔
> 使用 ***JDK*** 內的 ***jar***

> 語法 1: 將兩個類別文件歸檔到名為 classes.jar 的Jar檔中: 
>> jar cvf classes.jar Foo.class Bar.class 

> 語法 2: 使用指定的封裝內容文件 MYMANIFEST.MF 並將資料夾 jarFile/ 中的所有檔案封裝到 classes.jar 
>> jar cvfm classes.jar MYMANIFEST.MF -C jarFile/ .
