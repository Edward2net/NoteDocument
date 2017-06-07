# 排名Top16的Java函數庫
---

[資料來源](http://www.hollischuang.com/archives/1606)

在Java中，有很多比較實用的函數庫，他們通常都定義了一系列具有常見功能的方法。

本文總結了最常用的Java中的實用類以及他們的最常用的方法。無論是函數和類別中方法都是按照流行程度來排序的。

本文中列出來的類別及方法都是經過大量實踐的常用函數庫及方法，我們可以直接拿過來用。

當然，這些方法實現的功能我們自己都能實現，但是既然已經有很成熟的方法可以供我們使用了，那麼就無需自己定義了。

很多類和方法通過他們的名字其實可以理解出具體是做什麼的。

每個方法都有一個連結，可以查看他們在開原始碼中具體是如何使用的。

---

以下列表是通過分析50K的開源項目得出來的。

## 1. [org.apache.commons.io.IOUtils](http://www.programcreek.com/java-api-examples/index.php?api=org.apache.commons.io.IOUtils)

>  - [closeQuietly ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.io.IOUtils&amp;method=closeQuietly)
>  - [toString ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.io.IOUtils&amp;method=toString)
>  - [copy ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.io.IOUtils&amp;method=copy)
>  - [toByteArray ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.io.IOUtils&amp;method=toByteArray)
>  - [write ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.io.IOUtils&amp;method=write)
>  - [toInputStream ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.io.IOUtils&amp;method=toInputStream)
>  - [readLines ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.io.IOUtils&amp;method=readLines)
>  - [copyLarge ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.io.IOUtils&amp;method=copyLarge)
>  - [lineIterator ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.io.IOUtils&amp;method=lineIterator)
>  - [readFully ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.io.IOUtils&amp;method=readFully)

## 2. [org.apache.commons.io.FileUtils](http://www.programcreek.com/java-api-examples/index.php?api=org.apache.commons.io.FileUtils)

>  - [deleteDirectory ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.io.FileUtils&amp;method=deleteDirectory)
>  - [readFileToString ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.io.FileUtils&amp;method=readFileToString)
>  - [deleteQuietly ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.io.FileUtils&amp;method=deleteQuietly)
>  - [copyFile ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.io.FileUtils&amp;method=copyFile)
>  - [writeStringToFile ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.io.FileUtils&amp;method=writeStringToFile)
>  - [forceMkdir ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.io.FileUtils&amp;method=forceMkdir)
>  - [write ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.io.FileUtils&amp;method=write)
>  - [listFiles ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.io.FileUtils&amp;method=listFiles)
>  - [copyDirectory ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.io.FileUtils&amp;method=copyDirectory)
>  - [forceDelete ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.io.FileUtils&amp;method=forceDelete)

## 3. [org.apache.commons.lang.StringUtils](http://www.programcreek.com/java-api-examples/index.php?api=org.apache.commons.lang.StringUtils)

>  - [isBlank ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang.StringUtils&amp;method=isBlank)
>  - [isNotBlank ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang.StringUtils&amp;method=isNotBlank)
>  - [isEmpty ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang.StringUtils&amp;method=isEmpty)
>  - [isNotEmpty ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang.StringUtils&amp;method=isNotEmpty)
>  - [equals ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang.StringUtils&amp;method=equals)
>  - [join ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang.StringUtils&amp;method=join)
>  - [split ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang.StringUtils&amp;method=split)
>  - [EMPTY](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang.StringUtils&amp;method=EMPTY)
>  - [trimToNull ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang.StringUtils&amp;method=trimToNull)
>  - [replace ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang.StringUtils&amp;method=replace)

## 4. [org.apache.http.util.EntityUtils](http://www.programcreek.com/java-api-examples/index.php?api=org.apache.http.util.EntityUtils)

>  - [toString ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.http.util.EntityUtils&amp;method=toString)
>  - [consume ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.http.util.EntityUtils&amp;method=consume)
>  - [toByteArray ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.http.util.EntityUtils&amp;method=toByteArray)
>  - [consumeQuietly ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.http.util.EntityUtils&amp;method=consumeQuietly)
>  - [getContentCharSet ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.http.util.EntityUtils&amp;method=getContentCharSet)

## 5. [org.apache.commons.lang3.StringUtils](http://www.programcreek.com/java-api-examples/index.php?api=org.apache.commons.lang3.StringUtils)

>  - [isBlank ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang3.StringUtils&amp;method=isBlank)
>  - [isNotBlank ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang3.StringUtils&amp;method=isNotBlank)
>  - [isEmpty ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang3.StringUtils&amp;method=isEmpty)
>  - [isNotEmpty ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang3.StringUtils&amp;method=isNotEmpty)
>  - [join ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang3.StringUtils&amp;method=join)
>  - [equals ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang3.StringUtils&amp;method=equals)
>  - [split ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang3.StringUtils&amp;method=split)
>  - [EMPTY](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang3.StringUtils&amp;method=EMPTY)
>  - [replace ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang3.StringUtils&amp;method=replace)
>  - [capitalize ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang3.StringUtils&amp;method=capitalize)

## 6. [org.apache.commons.io.FilenameUtils](http://www.programcreek.com/java-api-examples/index.php?api=org.apache.commons.io.FilenameUtils)

>  - [getExtension ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.io.FilenameUtils&amp;method=getExtension)
>  - [getBaseName ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.io.FilenameUtils&amp;method=getBaseName)
>  - [getName ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.io.FilenameUtils&amp;method=getName)
>  - [concat ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.io.FilenameUtils&amp;method=concat)
>  - [removeExtension ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.io.FilenameUtils&amp;method=removeExtension)
>  - [normalize ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.io.FilenameUtils&amp;method=normalize)
>  - [wildcardMatch ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.io.FilenameUtils&amp;method=wildcardMatch)
>  - [separatorsToUnix ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.io.FilenameUtils&amp;method=separatorsToUnix)
>  - [getFullPath ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.io.FilenameUtils&amp;method=getFullPath)
>  - [isExtension ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.io.FilenameUtils&amp;method=isExtension)

## 7. [org.springframework.util.StringUtils](http://www.programcreek.com/java-api-examples/index.php?api=org.springframework.util.StringUtils)

>  - [hasText ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.springframework.util.StringUtils&amp;method=hasText)
>  - [hasLength ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.springframework.util.StringUtils&amp;method=hasLength)
>  - [isEmpty ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.springframework.util.StringUtils&amp;method=isEmpty)
>  - [commaDelimitedListToStringArray ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.springframework.util.StringUtils&amp;method=commaDelimitedListToStringArray)
>  - [collectionToDelimitedString ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.springframework.util.StringUtils&amp;method=collectionToDelimitedString)
>  - [replace ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.springframework.util.StringUtils&amp;method=replace)
>  - [delimitedListToStringArray ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.springframework.util.StringUtils&amp;method=delimitedListToStringArray)
>  - [uncapitalize ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.springframework.util.StringUtils&amp;method=uncapitalize)
>  - [collectionToCommaDelimitedString ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.springframework.util.StringUtils&amp;method=collectionToCommaDelimitedString)
>  - [tokenizeToStringArray ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.springframework.util.StringUtils&amp;method=tokenizeToStringArray)

## 8. [org.apache.commons.lang.ArrayUtils](http://www.programcreek.com/java-api-examples/index.php?api=org.apache.commons.lang.ArrayUtils)

>  - [contains ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang.ArrayUtils&amp;method=contains)
>  - [addAll ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang.ArrayUtils&amp;method=addAll)
>  - [clone ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang.ArrayUtils&amp;method=clone)
>  - [isEmpty ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang.ArrayUtils&amp;method=isEmpty)
>  - [add ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang.ArrayUtils&amp;method=add)
>  - [EMPTY_BYTE_ARRAY](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang.ArrayUtils&amp;method=EMPTY_BYTE_ARRAY)
>  - [subarray ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang.ArrayUtils&amp;method=subarray)
>  - [indexOf ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang.ArrayUtils&amp;method=indexOf)
>  - [isEquals ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang.ArrayUtils&amp;method=isEquals)
>  - [toObject ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang.ArrayUtils&amp;method=toObject)

## 9. [org.apache.commons.lang.StringEscapeUtils](http://www.programcreek.com/java-api-examples/index.php?api=org.apache.commons.lang.StringEscapeUtils)

>  - [escapeHtml ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang.StringEscapeUtils&amp;method=escapeHtml)
>  - [unescapeHtml ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang.StringEscapeUtils&amp;method=unescapeHtml)
>  - [escapeXml ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang.StringEscapeUtils&amp;method=escapeXml)
>  - [escapeSql ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang.StringEscapeUtils&amp;method=escapeSql)
>  - [unescapeJava ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang.StringEscapeUtils&amp;method=unescapeJava)
>  - [escapeJava ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang.StringEscapeUtils&amp;method=escapeJava)
>  - [escapeJavaScript ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang.StringEscapeUtils&amp;method=escapeJavaScript)
>  - [unescapeXml ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang.StringEscapeUtils&amp;method=unescapeXml)
>  - [unescapeJavaScript ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang.StringEscapeUtils&amp;method=unescapeJavaScript)

## 10. [org.apache.http.client.utils.URLEncodedUtils](http://www.programcreek.com/java-api-examples/index.php?api=org.apache.http.client.utils.URLEncodedUtils)

>  - [format ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.http.client.utils.URLEncodedUtils&amp;method=format)
>  - [parse ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.http.client.utils.URLEncodedUtils&amp;method=parse)

## 11. [org.apache.commons.codec.digest.DigestUtils](http://www.programcreek.com/java-api-examples/index.php?api=org.apache.commons.codec.digest.DigestUtils)

>  - [md5Hex ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.codec.digest.DigestUtils&amp;method=md5Hex)
>  - [shaHex ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.codec.digest.DigestUtils&amp;method=shaHex)
>  - [sha256Hex ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.codec.digest.DigestUtils&amp;method=sha256Hex)
>  - [sha1Hex ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.codec.digest.DigestUtils&amp;method=sha1Hex)
>  - [sha ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.codec.digest.DigestUtils&amp;method=sha)
>  - [md5 ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.codec.digest.DigestUtils&amp;method=md5)
>  - [sha512Hex ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.codec.digest.DigestUtils&amp;method=sha512Hex)
>  - [sha1 ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.codec.digest.DigestUtils&amp;method=sha1)

## 12. [org.apache.commons.collections.CollectionUtils](http://www.programcreek.com/java-api-examples/index.php?api=org.apache.commons.collections.CollectionUtils)

>  - [isEmpty ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.collections.CollectionUtils&amp;method=isEmpty)
>  - [isNotEmpty ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.collections.CollectionUtils&amp;method=isNotEmpty)
>  - [select ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.collections.CollectionUtils&amp;method=select)
>  - [transform ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.collections.CollectionUtils&amp;method=transform)
>  - [filter ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.collections.CollectionUtils&amp;method=filter)
>  - [find ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.collections.CollectionUtils&amp;method=find)
>  - [collect ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.collections.CollectionUtils&amp;method=collect)
>  - [forAllDo ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.collections.CollectionUtils&amp;method=forAllDo)
>  - [addAll ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.collections.CollectionUtils&amp;method=addAll)
>  - [isEqualCollection ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.collections.CollectionUtils&amp;method=isEqualCollection)

## 13. [org.apache.commons.lang3.ArrayUtils](http://www.programcreek.com/java-api-examples/index.php?api=org.apache.commons.lang3.ArrayUtils)

>  - [contains ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang3.ArrayUtils&amp;method=contains)
>  - [isEmpty ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang3.ArrayUtils&amp;method=isEmpty)
>  - [isNotEmpty ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang3.ArrayUtils&amp;method=isNotEmpty)
>  - [add ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang3.ArrayUtils&amp;method=add)
>  - [clone ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang3.ArrayUtils&amp;method=clone)
>  - [addAll ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang3.ArrayUtils&amp;method=addAll)
>  - [subarray ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang3.ArrayUtils&amp;method=subarray)
>  - [indexOf ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang3.ArrayUtils&amp;method=indexOf)
>  - [EMPTY_OBJECT_ARRAY](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang3.ArrayUtils&amp;method=EMPTY_OBJECT_ARRAY)
>  - [EMPTY_STRING_ARRAY](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang3.ArrayUtils&amp;method=EMPTY_STRING_ARRAY)

## 14. [org.apache.commons.beanutils.PropertyUtils](http://www.programcreek.com/java-api-examples/index.php?api=org.apache.commons.beanutils.PropertyUtils)

>  - [getProperty ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.beanutils.PropertyUtils&amp;method=getProperty)
>  - [setProperty ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.beanutils.PropertyUtils&amp;method=setProperty)
>  - [getPropertyDescriptors ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.beanutils.PropertyUtils&amp;method=getPropertyDescriptors)
>  - [isReadable ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.beanutils.PropertyUtils&amp;method=isReadable)
>  - [copyProperties ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.beanutils.PropertyUtils&amp;method=copyProperties)
>  - [getPropertyDescriptor ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.beanutils.PropertyUtils&amp;method=getPropertyDescriptor)
>  - [getSimpleProperty ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.beanutils.PropertyUtils&amp;method=getSimpleProperty)
>  - [isWriteable ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.beanutils.PropertyUtils&amp;method=isWriteable)
>  - [setSimpleProperty ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.beanutils.PropertyUtils&amp;method=setSimpleProperty)
>  - [getPropertyType ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.beanutils.PropertyUtils&amp;method=getPropertyType)

## 15. [org.apache.commons.lang3.StringEscapeUtils](http://www.programcreek.com/java-api-examples/index.php?api=org.apache.commons.lang3.StringEscapeUtils)

>  - [unescapeHtml4 ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang3.StringEscapeUtils&amp;method=unescapeHtml4)
>  - [escapeHtml4 ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang3.StringEscapeUtils&amp;method=escapeHtml4)
>  - [escapeXml ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang3.StringEscapeUtils&amp;method=escapeXml)
>  - [unescapeXml ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang3.StringEscapeUtils&amp;method=unescapeXml)
>  - [escapeJava ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang3.StringEscapeUtils&amp;method=escapeJava)
>  - [escapeEcmaScript ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang3.StringEscapeUtils&amp;method=escapeEcmaScript)
>  - [unescapeJava ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang3.StringEscapeUtils&amp;method=unescapeJava)
>  - [escapeJson ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang3.StringEscapeUtils&amp;method=escapeJson)
>  - [escapeXml10 ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.lang3.StringEscapeUtils&amp;method=escapeXml10)

## 16. [org.apache.commons.beanutils.BeanUtils](http://www.programcreek.com/java-api-examples/index.php?api=org.apache.commons.beanutils.BeanUtils)

>  - [copyProperties ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.beanutils.BeanUtils&amp;method=copyProperties)
>  - [getProperty ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.beanutils.BeanUtils&amp;method=getProperty)
>  - [setProperty ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.beanutils.BeanUtils&amp;method=setProperty)
>  - [describe ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.beanutils.BeanUtils&amp;method=describe)
>  - [populate ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.beanutils.BeanUtils&amp;method=populate)
>  - [copyProperty ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.beanutils.BeanUtils&amp;method=copyProperty)
>  - [cloneBean ( )](http://www.programcreek.com/java-api-examples/index.php?class=org.apache.commons.beanutils.BeanUtils&amp;method=cloneBean)

---

# 十個非常有用的第三方Java庫

Java是世界上最強大的程式語言之一，很多開發人員和大型企業都偏愛Java，並且在各種應用場景中使用它。在本文中，我們為大家介紹幾種Java庫來幫助開發人員解決編程中遇到的各種相關問題。這些庫包含了允許擴展功能的軟體包，迎合不同類型的Java應用程式。

## Commons Math
Commons Math是Apache上一個輕量級自容器的數學和統計計算方法包，包含大多數常用的數值算法。

## LWJGL
LWJGL(Lightweight Java Game Library)可以幫助Java程式設計師開發有著商業性質的遊戲。LWJGL為開發者提供簡單易用的API來訪問OpenGL (Open Graphics Library)和OpenAL (Open Audio Library)，同樣也提供操作控制器(Gamepads, Steering wheel和操縱杆)的API。

## Jsoup
Jsoup是一款Java的HTML解析器，可直接解析某個URL地址、HTML文本內容。它提供了一套非常省力的API，可通過DOM、CSS以及類似於jQuery的操作方法來取出和操作數據。

## SWT
SWT是一個開源的GUI編程框架，與AWT/Swing有相似的用處，著名的開源IDE-eclipse就是用SWT開發的。 SWT是一個為Java設計的提供高效的部件工具包，實現可攜式的用戶訪問介面作業系統。

## FreeHEP
FreeHEP是一個非常有用的庫，針對於開發web應用程式重用Java代碼。該庫提供了幾個組件，如HepRep、矢量圖像包、PostScript查看器、AID編譯器等。

## Apache Log4j
Apache Log4j是Apache的一個開放原始碼項目。通過使用Log4j，可以控制日誌信息輸送的目的地是控制台、文件、GUI組件、甚至是套接口伺服器、NT的事件記錄器、UNIX Syslog守護進程等。

## Jackson
Jackson是一個用來處理JSON格式數據的Java類庫，性能非常好。它可以輕鬆地將Java對象轉換成json對象和xml文檔，同樣也可以將json、xml轉換成Java對象。

## JFreeChart
JFreeChart是Java平台上的一個開放的圖表繪製類庫。它完全使用JAVA語言編寫，是為applications、applets、servlets以及JSP等使用所設計的。

## Guava
Guava是Google的一個開源項目，包含許多Google核心的Java常用庫。

## Hibernate
Hibernate是一種Java語言下的對象關係映射解決方案。它為面向對象的領域模型到傳統的關係型資料庫的映射，提供了一個使用方便的框架。Hibernate也是目前Java開發中最為流行的資料庫持久層框架，現已歸JBOSS所有。
