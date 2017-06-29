# 暫存筆記

---
## 字串處理

'''
// 將","分隔的字串切割為List(java.util.List;)
public static List<String> getParamsToList(String params) {  
      if(StringUtils.isBlank(params)) {   return new ArrayList<String>();  }     
      // org.apache.commons.lang.StringUtils
      return Arrays.asList(StringUtils.split(params, SEPARATE_COMMA)); 
}
'''
