package com.com.ocm.service;

import java.util.List;
import java.util.Map;

import com.com.ocm.vo.BoardVO;

public interface BoardService {

	List<BoardVO> list(Map<String, Object> map);

	int insert(BoardVO vo);

	Map<String, Object> detail(int seq);

	int update(Map<String, Object> map);

	void delete(List<Integer> list);

	int totalCount(Map<String, Object> map);

}
