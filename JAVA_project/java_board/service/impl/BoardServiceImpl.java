package com.com.ocm.service.impl;

import java.util.List;
import java.util.Map;

import javax.annotation.Resource;

import org.springframework.stereotype.Service;

import com.com.ocm.dao.BoardDao;
import com.com.ocm.service.BoardService;
import com.com.ocm.vo.BoardVO;

@Service("boardService")
public class BoardServiceImpl implements BoardService{

	@Resource(name = "boardDao")
	private BoardDao boardDao;
	
	@Override
	public List<BoardVO> list(Map<String, Object> map) {
		// TODO Auto-generated method stub
		return boardDao.list(map);
	}

	@Override
	public int insert(BoardVO vo) {
		// TODO Auto-generated method stub
		return boardDao.insert(vo);
	}

	@Override
	public Map<String, Object> detail(int seq) {
		// TODO Auto-generated method stub
		return boardDao.detail(seq);
	}

	@Override
	public int update(Map<String, Object> map) {
		// TODO Auto-generated method stub
		return boardDao.update(map);
	}

	@Override
	public void delete(List<Integer> list) {
		// TODO Auto-generated method stub
		boardDao.delete(list);
	}

	@Override
	public int totalCount(Map<String, Object> map) {
		// TODO Auto-generated method stub
		return boardDao.totalCount(map);
	}

}
