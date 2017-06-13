# Spring全域異常處理的三種方式

[參考網址](http://www.jianshu.com/p/f968b8dcf95a)

在J2EE項目的開發中，不管是對底層的數據庫操作過程，還是業務層的處理過程，還是控制層的處理過程，都不可避免會遇到各種可預知的、不可預知的異常需要處理。每個過程都單獨處理異常，系統的代碼耦合度高，工作量大且不好統一，維護的工作量也很大。 那麼，能不能將所有類型的異常處理從各處理過程解耦出來，這樣既保證了相關處理過程的功能較單一，也實現了異常信息的統一處理和維護？答案是肯定的。下面將介紹使用Spring MVC統一處理異常的解決和實現過程

1.使用Spring MVC提供的SimpleMappingExceptionResolver

2.實現Spring的異常處理接口HandlerExceptionResolver 自定義自己的異常處理器

3.使用@ExceptionHandler注解實現異常處理

---

### (一) SimpleMappingExceptionResolver 
使用這種方式具有集成簡單、有良好的擴展性、對已有代碼沒有入侵性等優點，但該方法僅能獲取到異常信息，若在出現異常時，對需要獲取除異常以外的數據的情況不適用。

``` 
@Configuration
@EnableWebMvc
@ComponentScan(basePackages = {"com.balbala.mvc.web"})
public class WebMVCConfig extends WebMvcConfigurerAdapter{
  @Bean
    public SimpleMappingExceptionResolver simpleMappingExceptionResolver()
    {
        SimpleMappingExceptionResolver b = new SimpleMappingExceptionResolver();
        Properties mappings = new Properties();
        mappings.put("org.springframework.web.servlet.PageNotFound", "page-404");
        mappings.put("org.springframework.dao.DataAccessException", "data-access");
        mappings.put("org.springframework.transaction.TransactionException", "transaction-Failure");
        b.setExceptionMappings(mappings);
        return b;
    }
}
``` 

---

## (二) HandlerExceptionResolver
相比第一種來說,HandlerExceptionResolver能准確顯示定義的異常處理頁面,達到了統一異常處理的目標

1.定義一個類實現HandlerExceptionResolver接口,這次貼一個自己以前的代碼
``` 
package com.athena.common.handler;
import com.athena.common.constants.ResponseCode;
import com.athena.common.exception.AthenaException;
import com.athena.common.http.RspMsg;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.web.servlet.HandlerExceptionResolver;
import org.springframework.web.servlet.ModelAndView;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.io.PrintWriter;
/** 
  * Created by sam on 15/4/14. 
 */
public class GlobalHandlerExceptionResolver implements HandlerExceptionResolver {   
 private static final Logger LOG = LoggerFactory.getLogger(GlobalHandlerExceptionResolver.class);                 
   /**     
    * 在這裡處理所有得異常信息     
    */    
   @Override    
   public ModelAndView resolveException(HttpServletRequest req,                                         HttpServletResponse resp, Object o, Exception ex) {   
       ex.printStackTrace();     
       if (ex instanceof AthenaException) {    
           //AthenaException為一個自定義異常
           ex.printStackTrace();         
           printWrite(ex.toString(), resp);     
           return new ModelAndView();  
        }    
       //RspMsg為一個自定義處理異常信息的類  
       //ResponseCode為一個自定義錯誤碼的接口
       RspMsg unknownException = null;      
       if (ex instanceof NullPointerException) {        
           unknownException = new RspMsg(ResponseCode.CODE_UNKNOWN, "業務判空異常", null);
       } else {          
           unknownException = new RspMsg(ResponseCode.CODE_UNKNOWN, ex.getMessage(), null);        }      
           printWrite(unknownException.toString(), resp);   
           return new ModelAndView();   
   }  

   /**     
   * 將錯誤信息添加到response中     
   *     
   * @param msg     
   * @param response     
   * @throws IOException     
   */   
    public static void printWrite(String msg, HttpServletResponse response) {      
         try {           
             PrintWriter pw = response.getWriter();        
             pw.write(msg);       
             pw.flush();       
             pw.close();      
          } catch (Exception e) {          
             e.printStackTrace();      
          }   
    }
}
``` 

2.加入spring的配置中,這裡只貼出了相關部分
``` 
import com.athena.common.handler.GlobalHandlerExceptionResolver;
import org.springframework.context.annotation.Bean;
import com.athena.common.handler.GlobalHandlerExceptionResolver;
import org.springframework.web.servlet.config.annotation.WebMvcConfigurerAdapter;
/** 
  * Created by sam on 15/4/14. 
 */
public class WebSpringMvcConfig extends WebMvcConfigurerAdapter {

    @Bean
   public GlobalHandlerExceptionResolver globalHandlerExceptionResolver() {
      return new GlobalHandlerExceptionResolver();
   }
}
``` 

---

## (三)@ExceptionHandler
這是筆者現在項目的使用方式,這裡也僅貼出了相關部分
1.首先定義一個父類,實現一些基礎的方法

```
package com.balabala.poet.base.spring;
import com.google.common.base.Throwables;
import com.raiyee.poet.base.exception.MessageException;
import com.raiyee.poet.base.utils.Ajax;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.core.annotation.AnnotationUtils;
import org.springframework.http.HttpStatus;
import org.springframework.web.bind.annotation.ResponseStatus;
import org.springframework.web.servlet.ModelAndView;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.Date;

public class BaseGlobalExceptionHandler {    
     protected static final Logger logger = null;   
     protected static final String DEFAULT_ERROR_MESSAGE = "系統忙，請稍後再試"; 

     protected ModelAndView handleError(HttpServletRequest req, HttpServletResponse rsp, Exception e, String viewName, HttpStatus status) throws Exception {    
         if (AnnotationUtils.findAnnotation(e.getClass(), ResponseStatus.class) != null)       
         throw e;     
         String errorMsg = e instanceof MessageException ? e.getMessage() : DEFAULT_ERROR_MESSAGE;        
         String errorStack = Throwables.getStackTraceAsString(e);   

         getLogger().error("Request: {} raised {}", req.getRequestURI(), errorStack);       
         if (Ajax.isAjax(req)) {        
              return handleAjaxError(rsp, errorMsg, status);   
         }        
         return handleViewError(req.getRequestURL().toString(), errorStack, errorMsg, viewName);  
     }   

     protected ModelAndView handleViewError(String url, String errorStack, String errorMessage, String viewName) {        
          ModelAndView mav = new ModelAndView();       
          mav.addObject("exception", errorStack);        
          mav.addObject("url", url);     
          mav.addObject("message", errorMessage);  
          mav.addObject("timestamp", new Date());        
          mav.setViewName(viewName);    
          return mav;   
       }    

     protected ModelAndView handleAjaxError(HttpServletResponse rsp, String errorMessage, HttpStatus status) throws IOException {        
            rsp.setCharacterEncoding("UTF-8");       
            rsp.setStatus(status.value());      
            PrintWriter writer = rsp.getWriter();
            writer.write(errorMessage);        
            writer.flush();        
            return null;    
      }    

     public Logger getLogger() {       
           return LoggerFactory.getLogger(BaseGlobalExceptionHandler.class);
     } 
}
```

2.針對你需要捕捉的異常實現相對應的處理方式
```
package com.balabala.poet.base.spring;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.http.HttpStatus;
import org.springframework.web.bind.annotation.ControllerAdvice;
import org.springframework.web.bind.annotation.ExceptionHandler;
import org.springframework.web.bind.annotation.ResponseStatus;
import org.springframework.web.servlet.ModelAndView;
import org.springframework.web.servlet.NoHandlerFoundException;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
@ControllerAdvice
public class GlobalExceptionHandler extends BaseGlobalExceptionHandler {    

      //比如404的異常就會被這個方法捕獲
      @ExceptionHandler(NoHandlerFoundException.class)    
      @ResponseStatus(HttpStatus.NOT_FOUND)    
       public ModelAndView handle404Error(HttpServletRequest req, HttpServletResponse rsp, Exception e) throws Exception {    
             return handleError(req, rsp, e, "error-front", HttpStatus.NOT_FOUND);    
       }    

      //500的異常會被這個方法捕獲
      @ExceptionHandler(Exception.class)      
      @ResponseStatus(HttpStatus.INTERNAL_SERVER_ERROR) 
      public ModelAndView handleError(HttpServletRequest req, HttpServletResponse rsp, Exception e) throws Exception { 
             return handleError(req, rsp, e, "error-front", HttpStatus.INTERNAL_SERVER_ERROR);  
      }    

     //TODO  你也可以再寫一個方法來捕獲你的自定義異常
     //TRY NOW!!!

      @Override    
      public Logger getLogger() {      
            return LoggerFactory.getLogger(GlobalExceptionHandler.class);    
      }

  }
```