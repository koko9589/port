package com.com.ocm;

import java.io.File;
import java.io.IOException;
import java.util.Iterator;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.multipart.MultipartFile;
import org.springframework.web.multipart.MultipartHttpServletRequest;
import org.springframework.web.servlet.ModelAndView;

@Controller
public class StudyController {

	private static final String filePath = "C:/Users/gsStudy/Desktop/upload/";
	
	@RequestMapping("test")
	public String test() {
		return "testJsp";
	}
	
	@RequestMapping("testMv")
	public ModelAndView testMv() {
		ModelAndView mv= new ModelAndView("testJsp");
		return mv;
	}
	
	@RequestMapping("fileUpload")
	public String fileUpload() {
		return "fileUpload";
	}
	
	@RequestMapping("upload")
	public String upload(MultipartHttpServletRequest mRequest) throws IllegalStateException, IOException {
		Iterator<String> itr = mRequest.getFileNames();
		
		
		while(itr.hasNext()) {
			MultipartFile mFile = mRequest.getFile(itr.next());
			if(mFile.getSize() !=0) {
				String fileName = System.currentTimeMillis() + "_" + 				mFile.getOriginalFilename();
				mFile.transferTo(new File(filePath+fileName));
			}
			
		}
		return "fileUpload";
	}
}
