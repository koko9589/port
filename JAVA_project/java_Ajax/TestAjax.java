package com.com.ocm;

import javax.servlet.http.HttpServletRequest;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.ui.ModelMap;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.servlet.ModelAndView;

@Controller
public class TestController {

	@RequestMapping("temp")
	public String temp(Model model, ModelMap mMap) {
		model.addAttribute("testStr", 123);
		model.addAttribute("testStr1", "11111");
		return "test";
	}
	
	@RequestMapping("tempMv")
	public ModelAndView mvTemp() {
		ModelAndView mv = new ModelAndView("test");
		mv.addObject("testStr", 123);
		mv.addObject("testStr1", "11111");
		return mv;
	}
	
	@RequestMapping("jspOne")
	public String one() {
		return "one";
	}
	
	@RequestMapping("jspTwo")
	public String Two(HttpServletRequest reqeust) {
		
		String txt = reqeust.getParameter("test");
		
		String txt1 = reqeust.getParameter("txt1");
		String txt2 = reqeust.getParameter("txt2");
		
		System.out.println("값 확인 : " + txt);
		
		return "two";
	}
	
	@RequestMapping("ajaxView")
	public String ajaxView() {
		return "ajaxView";
	}
	
	@RequestMapping("ajaxText")
	public String ajaxText(HttpServletRequest request, Model model) {
		String txt = request.getParameter("txt");
		String txt1 = request.getParameter("txt2");
		System.out.println("값 체크 : " + txt + "//" + txt1);
		
		model.addAttribute("txt", txt);
		
		return "ajaxView2";
	}
	
	@RequestMapping("ajaxSum")
	@ResponseBody
	public String ajaxSum(HttpServletRequest request) {
		String txt = request.getParameter("txt");
		String txt1 = request.getParameter("txt2");
		return txt + txt1;
	}
}

