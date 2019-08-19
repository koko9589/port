package com.com.ocm.controller;

import java.lang.reflect.Array;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;
import java.util.Map;

import javax.annotation.Resource;
import javax.servlet.http.HttpServletRequest;

import org.mybatis.spring.SqlSessionTemplate;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.servlet.ModelAndView;

import com.com.ocm.service.BoardService;
import com.com.ocm.vo.BoardVO;
import com.com.ocm.vo.PageVO;

@Controller
public class BoardController{

	@Resource(name = "boardService")
	private BoardService boardService;
	
	@Autowired
	private SqlSessionTemplate sqlssion;

	@RequestMapping("board")
	public String board(Model model, @RequestParam Map<String, Object> map, HttpServletRequest request){
		
		String pageNum = request.getParameter("pageNo")==null?"1":request.getParameter("pageNo");
//		if(pageNum==null) {
//			pageNum = "1";
//		}
		
		int total = boardService.totalCount(map);
		PageVO vo = new PageVO();
		vo.setPageNo(Integer.parseInt(pageNum));
		vo.setPageSize(7);
		vo.setPageBlock(4);
		vo.setTotalCount(total);
		
		List<BoardVO> list = new ArrayList<BoardVO>();
		map.put("pageNo", Integer.parseInt(pageNum));
		map.put("listSize", 7);
		list = boardService.list(map);
		model.addAttribute("board", list);
		model.addAttribute("pageVO", vo);
		
		return "board/list";
	}
	
	@RequestMapping("boardMap")
	public String boardMap(Model model) {
		List<Map<String, Object>> listMap = new ArrayList<Map<String,Object>>(); 
		listMap = sqlssion.selectList("mapper.listMap");
		model.addAttribute("boardMap", listMap);
		return "board/list";
		
	}

	@RequestMapping("writeView")
	public String writeView() {
		return "board/write";
	}

	@RequestMapping("insert")
	public String insert(BoardVO vo) {

		int insert = boardService.insert(vo);

		return "redirect:board";
	}
	
	@RequestMapping("detail")
	public ModelAndView detail(@RequestParam int seq) {
		ModelAndView mv = new ModelAndView("board/write");
		
		Map<String,Object> map = boardService.detail(seq);
		mv.addObject("map", map);
		
		return mv;
		
	}
	
	@RequestMapping("update")
	public String update(@RequestParam Map<String, Object> map) {
		
		int update = boardService.update(map);
		
		return "redirect:board";
	}
	
	@RequestMapping("delete")
	public String delete(@RequestParam Integer[] chk) {
		
		List<Integer> list = Arrays.asList(chk);
		boardService.delete(list);
		
		return "redirect:board";
	}

}
